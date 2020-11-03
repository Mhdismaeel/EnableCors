<?php
namespace App\Actions\Log;

use App\Models\Activity_log;

class GetAllActivityLogAction
{

    public static function execute()
    {
        $logs=Activity_log::orderBy('id','DESC')->get();

        return $logs;

    }

}
