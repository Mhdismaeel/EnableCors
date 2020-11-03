<?php
namespace App\Actions\Ticket;

use App\Models\Ticket;
use Carbon\Carbon;

class GetTicketDetailsAction
{

    public static function execute($slug)
    {
        $datetimeNow=Carbon::now();

        $ticket=Ticket::selectRaw('tickets.*,TIMESTAMPDIFF(SECOND,tickets.created_at,now()) as duration')
        ->where('slug',$slug)->get();

        return $ticket;

    }

}
