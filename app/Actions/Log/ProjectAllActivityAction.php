<?php
namespace App\Actions\Log;

use App\Models\Project_activity;
use App\Models\Project;

class  ProjectAllActivityAction
{
    public static function execute($projectid)
    {
        $project=Project::FindOrFail($projectid);

        $activity=Project_activity::where('project_id',$projectid)->get();

        return $activity;


    }
}
