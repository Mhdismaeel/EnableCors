<?php
namespace App\Actions\Log;

use App\Models\Http_log;

class GetHttpLogAction
{

    public static function execute()
    {
        $logs=Http_log::orderBy('created_at','DESC')->get();

        return $logs;

    }

}
