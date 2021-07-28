<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionalAssociation extends Model
{
    protected $primaryKey = 'ps_id';

    protected $fillable = [
        'user_id', 
        'professional_body', 
        'qualification',
        'date_attained'
    ];
}
