<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $primaryKey = 'organization_id';

    protected $fillable = [
        'name_of_organization', 
        'email',
        'nature_of_business', 
        'sector_of_operation',
        'year_established', 
        'staff_strenght', 
        'annual_turnover', 
        'profit_before_tax'
    ];
}
