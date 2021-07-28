<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $primaryKey = 'job_application_id';

    protected $table = 'job_applications';

    protected $fillable = [
        'user_id', 'job_id'
    ];
}
