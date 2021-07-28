<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalInfo extends Model
{
    protected $primaryKey = 'additional_info_id';

    protected $table = 'additional_info';

    protected $fillable = [
        'user_id', 
        'allow_to_contact_previous', 
        'criminal_conviction', 
        'details_of_conviction', 
        'availability', 
        'extra'
    ];
}
