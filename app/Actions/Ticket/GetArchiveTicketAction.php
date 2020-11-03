<?php
namespace App\Actions\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class GetArchiveTicketAction
{

    public static function execute()
    {
        $userid=Auth::id();

        $ticket=Ticket::where('assign_id',$userid)->
        where('is_archive','1')->get();
        return $ticket;

    }

}
