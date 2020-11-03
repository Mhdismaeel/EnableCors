<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Http_log extends Model
{
    use HasFactory;

  protected  $fillable=['uri','method','request_body','response'];

}
