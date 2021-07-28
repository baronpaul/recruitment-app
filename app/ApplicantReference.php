<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantReference extends Model
{
    
    protected $primaryKey = 'reference_id';

    protected $fillable = [
        'user_id', 
        'name_of_reference', 
        'email_of_reference', 
        'phone_of_reference', 
        'address_of_reference', 
        'relationship'
    ];

}
