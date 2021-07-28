<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    protected $primaryKey = 'employment_id';

    protected $table = 'employments';

    protected $fillable = [
        'user_id', 
        'name_of_employer', 
        'address_of_employer', 
        'industry', 
        'employment_start', 
        'employment_end', 
        'position_held', 
        'name_of_supervisor',
        'title_of_supervisor',
        'category_of_employees_supervised',
        'number_supervised',
        'reason_for_leaving', 
        'starting_salary',
        'salary_at_exit',
        'description_of_duties',
    ];
}
