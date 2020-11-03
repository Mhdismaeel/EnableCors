<?php
namespace App\Actions\Column;

use App\Models\Column;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Actions\Log\ProjectActivityAction;
use App\Models\Board;
class DeleteColumnAction
{
    public static function execute($slug)
    {
        $Column=Column::where('slug',$slug)->FirstOrFail();
        $user=User::FindorFail(Auth::id());
        $board=Board::FindorFail($Column->board_id);
        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'Column'=>$Column])
        ->useLog('Column_Log')
        ->log('Delete_Column');
        $project_activity=ProjectActivityAction::execute($user->name,'Delete_Column',$board->project_id,$Column);
        if($project_activity)
        {
            $Column->delete();
            return true;
        }


    }
}
