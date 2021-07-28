<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $primaryKey = 'education_id';

    protected $table = 'educations';

    protected $fillable = [
        'user_id', 
        'type_of_institution', 
        'name_of_institution',
        'address_of_institution', 
        'start_date', 
        'end_date', 
        'certificate_received', 
        'field_of_study', 
        'city', 
        'country'
    ];
}
