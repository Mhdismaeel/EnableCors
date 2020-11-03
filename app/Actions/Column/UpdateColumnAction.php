<?php
namespace App\Actions\Column;

use App\Models\Column;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Actions\Log\ProjectActivityAction;
use App\Models\Board;
class UpdateColumnAction
{
    public static function execute($inputs,$slug)
    {
        $column=Column::where('slug',$slug)->FirstOrFail();
        $user=User::FindorFail(Auth::id());
        $board=Board::FindorFail($inputs->board_id);

        $column->update([
            'title'=>$inputs->title,
            'board_id'=>$inputs->board_id,
            'is_finish'=>$inputs->is_finish


        ]);
        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'Column'=>$column])
        ->useLog('Column_Log')
        ->log('Update_Column');

        $project_activity=ProjectActivityAction::execute($user->name,'Update_Column',$board->project_id,$column);

        if($project_activity)
        {
            return $column;

        }


    }
}
