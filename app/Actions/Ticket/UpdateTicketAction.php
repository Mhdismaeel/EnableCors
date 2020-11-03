<?php
namespace App\Actions\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use App\Actions\Log\ProjectActivityAction;
use App\Models\Board;
use App\User;
class UpdateTicketAction
{

    public static function execute($inputs,$slug)
    {
        $ticket=Ticket::where('slug',$slug)->FirstOrFail();
        $userid=Auth::id();
        $user=User::FindOrFail($userid);
        $board=Board::FindOrFail($inputs->board_id);

        $ticket->update([

            'title'=>$inputs->title,
            'content'=>$inputs->content,
            'reporter_id'=>$userid,
            'assign_id'=>$inputs->assign_id,
            'board_id'=>$inputs->board_id,
            'type_id'=>$inputs->type_id,
            'priority_id'=>$inputs->priority_id,
            'column_id'=>$inputs->column_id,
            'parent_id'=>$inputs->parent_id


        ]);
        $project_activity=ProjectActivityAction::execute($user->name,'Update_Ticket',$board->project_id,$ticket);
        if($project_activity)
        {
            return $ticket;

        }

    }

}
