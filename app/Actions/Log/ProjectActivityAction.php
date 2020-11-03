<?php
namespace App\Actions\Log;

use App\Models\Project_activity;

class  ProjectActivityAction
{
    public static function execute($user_name='',$action_type='',$project_id=null,$property=[])
    {
        $proactivity=Project_activity::create([
            'user_name'=>$user_name,
            'action_type'=>$action_type,
            'project_id'=>$project_id ?? 0,
            'property'=>$property

        ]);

        return true;


    }
}
