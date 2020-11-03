<?php
namespace App\Actions\Board;
use App\Models\Board;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Actions\Log\ProjectActivityAction;

class StoreNewBoardsAction
{
    public static function execute($inputs)
    {
        $user=User::FindorFail(Auth::id());

        $board=Board::create([
            'title'=>$inputs->title,
            'description'=>$inputs->description,
            'project_id'=>$inputs->project_id
        ]);

        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'Board'=>$board])
        ->useLog('Board_Log')
        ->log('Store_Board');

        $project_activity=ProjectActivityAction::execute($user->name,'Crete_New_Board',$inputs->project_id,$board);

        if($project_activity)
        {
            return $board;

        }



    }

}
