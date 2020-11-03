<?php
namespace App\Actions\Project;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Actions\Log\ProjectActivityAction;

class UpdateProjectAction
{
    public static function execute($inputs,$id)
    {
        $project=Project::FindOrFail($id);
        $user=User::FindorFail(Auth::id());

        $project->update([
            'title'=>$inputs->title,
            'description'=>$inputs->description,
            'team_id'=>$inputs->teamid
        ]);

        activity()
        ->causedBy($user)
        ->withProperties(['name' => $user->name,'email'=>$user->email,'role_id'=>$user->role_id,'project'=>$project])
        ->useLog('Project_Log')
        ->log('Update_Project');

        $project_activity=ProjectActivityAction::execute($user->name,'Update_Project',$project->id,$project);

        if($project_activity)
        {
            return $project;

        }


    }
}
