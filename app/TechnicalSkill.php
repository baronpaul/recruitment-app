<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnicalSkill extends Model
{
    protected $primaryKey = 'skill_id';

    protected $fillable = [
        'user_id', 'skill', 'level'
    ];
}
