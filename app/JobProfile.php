<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobProfile extends Model
{
    
    protected $primaryKey = 'job_id';

    protected $table = 'job_profiles';

    protected $fillable = [
        'organization_id',
        'job_title', 
        'job_url',
        'department', 
        'location',
        'reporting_to',
        'number_of_direct_subordinates',
        'job_classification',
        'reason_for_vacancy',
        'key_responsibilities',
        'basic_educational_qualification',
        'professional_qualifications',
        'years_of_experience',
        'competences_required',
        'soft_skills_required',
        'annual_basic_salary',
        'fringe_benefits',
        'special_benefits',
        'other_benefits',
        'prepared_by',
        'position_held',
        'job_status'
    ];

}
