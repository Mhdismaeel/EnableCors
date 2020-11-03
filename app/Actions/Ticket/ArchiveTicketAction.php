<?php
namespace App\Actions\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use App\User;
class ArchiveTicketAction
{

    public static function execute($slug)
    {
        $ticket=Ticket::where('slug',$slug)->FirstOrFail();
        $userid=Auth::id();
        $user=User::FindOrFail($userid);
        if($ticket)
        {
            $ticket->is_archive=1;
            $ticket->save();

        }



            return $ticket;



    }

}
