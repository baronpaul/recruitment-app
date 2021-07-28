<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use Session;

use Mail;


use App\Organization;

use App\User;

use App\JobProfile;

use App\JobApplication;

use App\Education;

use App\Employment;

use App\EducationalCertificate;

use App\ProfessionalAssociation;

use App\TechnicalSkill;

use App\ApplicantReference;

use App\AdditionalInfo;

use App\Industry;


class AdminJobApplicationController extends Controller
{
    
protected $redirectTo = '/admin/login';


public function __construct()
{
    $this->middleware('admin.auth:admin');
}

    
    
public function index()
{
    return view('admin.job_profiles.index');
}


public function job($id)
{
    
    $job_profile = JobProfile::join('organizations', 'organizations.organization_id', '=', 'job_profiles.organization_id')
    ->where('job_profiles.job_id','=', $id)->first();
    
    $job_applications = JobApplication::join('users', 'users.id', 'job_applications.user_id')
    ->where('job_applications.job_id','=', $id)->get();


    return view('admin.job_profiles.applications')
    ->with('job_applications', $job_applications)
    ->with('job_profile', $job_profile);
}


public function detail($id)
{
    $user = JobApplication::join('users', 'users.id', 'job_applications.user_id')
    ->where('job_applications.job_application_id', '=', $id)->first();

    $job_profile = JobProfile::join('organizations', 'organizations.organization_id', '=', 'job_profiles.organization_id')
    ->where('job_profiles.job_id','=', $user->job_id)->first();

    $educations = Education::where('user_id', $user->id)->get();

    $employments = Employment::where('user_id', $user->id)->get();

    $professional_associations = ProfessionalAssociation::where('user_id', $user->id)->get();

    $computer_skills = ComputerSkill::where('user_id', $user->id)->get();

    $applicant_references = ApplicantReference::where('user_id', $user->id)->get();

    $additional_info = AdditionalInfo::where('user_id', $user->id)->first();

    return view('admin.job_profiles.application_detail')
    ->with('user', $user)
    ->with('job_profile', $job_profile)
    ->with('educations', $educations)
    ->with('employments', $employments)
    ->with('professional_associations', $professional_associations)
    ->with('computer_skills', $computer_skills)
    ->with('applicant_references', $applicant_references)
    ->with('additional_info', $additional_info);
}


public function filter($id)
{
    $user = JobApplication::join('users', 'users.id', 'job_applications.user_id')
    ->where('job_applications.job_application_id', '=', $id)->first();

    $job_profile = JobProfile::join('organizations', 'organizations.organization_id', '=', 'job_profiles.organization_id')
    ->where('job_profiles.job_id','=', $user->job_id)->first();

    $educational_certs = EducationalCertificate::all();

    $industries = Industry::orderBy('title', 'ASC')->get();

    return view('admin.job_profiles.filter_application')
    ->with('user', $user)
    ->with('job_profile', $job_profile)
    ->with('educational_certs', $educational_certs)
    ->with('industries', $industries);
}


public function do_filter(Request $request) {

    $job_id = $request->job_id;
    $industry = $request->industry;
    $years_of_experience = $request->years_of_experience;
    $academic_qualification = $request->academic_qualification;
    $professional_qualifications = $request->professional_qualifications;
    $technical_skills = $request->technical_skillls;
    $employment_history_key_words = $request->key_words;

    /*
    $filtered_applicants = JobApplication::join('users', 'users.id', '=', 'job_applications.user_id')
    ->join('employments', 'employments.user_id', '=', 'job_applications.user_id')
    ->join('educations', 'educations.user_id', '=', 'job_applications.user_id')
    ->join('technical_skills', 'technical_skills.user_id', '=', 'job_applications.user_id')
    ->join('professional_associations', 'professional_associations.user_id', '=', 'job_applications.user_id')
    ->where('employments.industry', '=', $industry)
    ->where('');
    */

    $total_experience = DB::table('users')
    ->join('job_applications', 'job_applications.user_id', '=', 'users.id')
    ->join('employments', 'employments.user_id', '=', 'users.id')
    ->join('educations', 'educations.user_id', '=', 'users.id')
    ->join('technical_skills', 'technical_skills.user_id', '=', 'users.id')
    ->join('professional_associations', 'professional_associations.user_id', '=', 'users.id')
    ->where('employments.industry', '=', $industry)
    //->where('educations.certificate_received', '=', $academic_qualification)
    ->select('users.firstname')
    //->where(DB::raw('sum(datediff(employments.employment_end, employments.employment_start)/365) as work_years ' > $years_of_experience))
    ->groupBy('users.firstname')
    ->get();
    dd($total_experience);
}

public function shortlist(Request $request)
{
    //
}


}
