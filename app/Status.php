<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = [
        'user_id', 'job_profile_id', 'job_application_id'
    ];
}
