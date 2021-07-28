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

use App\JobProfile;

use App\Organization;

use App\EducationalCertificate;

class AdminJobProfileController extends Controller
{


protected $redirectTo = '/admin/login';


public function __construct()
{
    //$this->middleware('admin.auth:admin');
}

public function index()
{
    $job_profiles = JobProfile::join('organizations', 'organizations.organization_id', '=', 'job_profiles.organization_id')
    ->get();

    $organizations = Organization::all();

    return view('admin.job_profiles.index')
    ->with('job_profiles', $job_profiles)
    ->with('organizations', $organizations);
}


public function create()
{
    $organizations = Organization::all();
    $educational_certificates = EducationalCertificate::all();

    return view('admin.job_profiles.create')
    ->with('organizations', $organizations)
    ->with('educational_certificates', $educational_certificates);
}


public function store(Request $request)
{
    $this->validate($request, [
        'organization_id' => 'required',
        'job_title' => 'required',
        'department' => 'required',
        'location' => 'required',
        'reporting_to' => 'required',
        'basic_educational_qualification' => 'required',
        'years_of_experience' => 'required'
    ]);

    $job_profile = new JobProfile;

    $job_profile->organization_id = $request->organization_id;
    $job_profile->job_title = $request->job_title;
    $job_profile->job_url = str_slug($request->job_title);
    $job_profile->department = $request->department;
    $job_profile->location = $request->location;
    $job_profile->reporting_to = $request->reporting_to;
    $job_profile->number_of_direct_subordinates = $request->number_of_direct_subordinates;
    $job_profile->job_classification = $request->job_classification;
    $job_profile->reason_for_vacancy = $request->reason_for_vacancy;
    $job_profile->key_responsibilities = $request->key_responsibilities;
    $job_profile->basic_educational_qualification = $request->basic_educational_qualification;
    $job_profile->professional_qualifications = $request->professional_qualifications;
    $job_profile->years_of_experience = $request->years_of_experience;
    $job_profile->competences_required = $request->competences_required;
    $job_profile->soft_skills_required = $request->soft_skills_required;
    $job_profile->annual_basic_salary = $request->annual_basic_salary;
    $job_profile->fringe_benefits = $request->fringe_benefits;
    $job_profile->special_benefits = $request->special_benefits;
    $job_profile->other_benefits = $request->other_benefits;
    $job_profile->prepared_by = $request->prepared_by;
    $job_profile->position_held = $request->position_held;
    $job_profile->job_status = 'active';
    $job_profile->save();

    Session::flash('success', 'Job Profile was added successfully');
    return redirect()->route('admin.job_profiles');

}


public function detail($id)
{
    $job_profile = JobProfile::where('job_id', $id)->first();

    return view('admin.job_profiles.detail')
    ->with('job_profile', $job_profile);
}


public function edit($id)
{
    $job_profile = JobProfile::where('job_id', $id)->first();
    $organizations = Organization::all();

    return view('admin.job_profiles.edit')
    ->with('job_profile', $job_profile)
    ->with('organizations', $organizations);
}


public function update(Request $request)
{
    $this->validate($request, [
        'organization_id' => 'required',
        'job_title' => 'required',
        'department' => 'required',
        'location' => 'required',
        'reporting_to' => 'required',
        'basic_educational_qualification' => 'required',
        'years_of_experience' => 'required'
    ]);

    $job_profile = JobProfile::where('job_id', $request->job_id)->first();

    $job_profile->organization_id = $request->organization_id;
    $job_profile->job_title = $request->job_title;
    $job_profile->job_url = str_slug($request->job_title);
    $job_profile->department = $request->department;
    $job_profile->location = $request->location;
    $job_profile->reporting_to = $request->reporting_to;
    $job_profile->number_of_direct_subordinates = $request->number_of_direct_subordinates;
    $job_profile->job_classification = $request->job_classification;
    $job_profile->reason_for_vacancy = $request->reason_for_vacancy;
    $job_profile->key_responsibilities = $request->key_responsibilities;
    $job_profile->basic_educational_qualification = $request->basic_educational_qualification;
    $job_profile->professional_qualifications = $request->professional_qualifications;
    $job_profile->years_of_experience = $request->years_of_experience;
    $job_profile->competences_required = $request->competences_required;
    $job_profile->soft_skills_required = $request->soft_skills_required;
    $job_profile->annual_basic_salary = $request->annual_basic_salary;
    $job_profile->fringe_benefits = $request->fringe_benefits;
    $job_profile->special_benefits = $request->special_benefits;
    $job_profile->other_benefits = $request->other_benefits;
    $job_profile->prepared_by = $request->prepared_by;
    $job_profile->position_held = $request->position_held;
    $job_profile->job_status = 'active';
    $job_profile->save();

    Session::flash('success', 'Job Profile was updated successfully');
    return redirect()->route('admin.job_profiles');
}


public function delete($id)
{
    $job_profile = JobProfile::where('job_id', $id)->first();
    $organizations = Organization::all();

    return view('admin.job_profiles.delete')
    ->with('job_profile', $job_profile)->with('organizations', $organizations);
}

public function destroy(Request $request)
{
    $job_profile = JobProfile::where('job_id', $request->job_profile_id)->first();
    $job_profile->delete();

    Session::flash('success', 'Job Profile was deleted successfully');
    return redirect()->route('admin.job_profiles');

}


}
