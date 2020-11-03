<?php
namespace App\Actions\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class GetAllTicketsAction
{

    public static function execute()
    {
        $userid=Auth::id();

        $ticket=Ticket::selectRaw('tickets.*,TIMESTAMPDIFF(SECOND,tickets.created_at,now()) as duration')
        ->where('assign_id',$userid)->
        where('is_archive','0')->get();
        return $ticket;

    }

}
