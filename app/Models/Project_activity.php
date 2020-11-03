<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_activity extends Model
{
    use HasFactory;

    protected $table='project_activity';


    protected $fillable=['user_name','action_type','project_id','property'];

    protected $casts = [
        'property' => 'array'
    ];

}
