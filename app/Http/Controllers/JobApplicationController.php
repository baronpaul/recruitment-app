<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use Session;

use Mail;

use App\User;

use App\JobProfile;

use App\JobApplication;

use App\Education;

use App\EducationalCertificate;

use App\Employment;

use App\ProfessionalAssociation;

use App\TechnicalSkill;

use App\ApplicantReference;

use App\AdditionalInfo;

use App\Industry;


class JobApplicationController extends Controller
{
    
public function index()
{
    $user = Auth::user();

    //check if the user has already applied for the job
    $jobs = JobProfile::join('job_applications', 'job_applications.job_id', '=', 'job_profiles.job_id')
    ->join('organizations', 'organizations.organization_id', '=', 'job_profiles.organization_id')
    ->where('job_applications.user_id','=', $user->id)->get();
    
    return view('job_application.index')
    ->with('jobs', $jobs)
    ->with('user', $user);   
}


public function start($url)
{
    $job = JobProfile::where('job_url', $url)->first();
    $user = Auth::user();

    //check if the user has already applied for the job
    $applied = JobApplication::where('user_id', $user->id)->first();
    
    if($applied == null) {
        return view('job_application.index')
        ->with('job', $job)
        ->with('user', $user);
    }
    else {
        $job = JobProfile::where('job_id', $job->job_id)->first();
        Session::flash('success', 'You have already applied for this job');
        return redirect()->route('jobs.detail', ['url' => $job->job_url]);
    }    
}


public function store_application(Request $request) {
    $job_id = $request->job_id;
    $user_id = Auth::id();

    $job_application = new JobApplication;
    $job_application->user_id = $user_id;
    $job_application->job_id = $job_id;
    $job_application->save();
    $job_application_id = $job_application->job_application_id;
    Session::put('job_id', $job_id);

    $user = User::where('id', $user_id)->first();

    if($user->profile_completed == 'no') {
        $user->nationality = $request->nationality;
        $user->permanent_address = $request->permanent_address;
        $user->current_address = $request->current_address;
        $user->telephone = $request->telephone;
        $user->save();

        return redirect()->route('job_application.education', ['id' => $job_id]);
    }
    else {
        Session::flash('success', 'Your job application was added successfully');
        return redirect()->route('job_application.complete', ['id' => $job_id]);
    }
}


public function edit($id) {
    $job = JobProfile::where('job_id', $id)->first();
    $user = Auth::user();

    return view('job_application.edit')
    ->with('job', $job)
    ->with('user', $user);
}


public function update() {
    $user_id = Auth::id();
    $job_id = $request->job_id;
    $job = JobProfile::where('job_id', $job_id)->first();

    $user = User::where('id', $user_id)->first();

    $user->firstname = $request->firstname;
    $user->lastname = $request->lastname;
    $user->middlename = $request->middlename;
    $user->email = $request->email;
    $user->date_of_birth = $request->date_of_birth;
    $user->sex = $request->sex;
    $user->marital_status = $request->marital_status;

    $user->nationality = $request->nationality;
    $user->permanent_address = $request->permanent_address;
    $user->current_address = $request->current_address;
    $user->telephone = $request->telephone;
    $user->save();

    Session::flash('success', 'Education record was added successfully');
    return redirect()->route('job_application.view_application', ['url' => $job->job_url]);
}


public function view_application($url) {
    $job = JobProfile::where('job_url', $url)->first();
    $user_id = Auth::id();
    
    $user = User::where('id', $user_id)->first();

    return view('job_application.view_application')
    ->with('job', $job)
    ->with('user', $user);
}


public function education($id)
{
    $job = JobProfile::where('job_id', $id)->first();
    $educational_certificates = EducationCertificate::all();

    return view('job_application.education')
    ->with('job', $job)
    ->with('educational_certificate', $educational_certificate);
}


public function store_education(Request $request) {
    $user_id = Auth::id();
    $job_id = $request->job_id;

    $data = $request->except(['_token']);
    $type_of_institutions = $request->type_of_institution;
    $name_of_institutions = $request->name_of_institution;
    $start_dates = $request->start_date;
    $end_dates = $request->end_date;
    $certificate_receiveds = $request->certificate_received;
    $field_of_studys = $request->field_of_study;
    $citys = $request->city;
    $countrys = $request->country;

    for($i = 0; $i < count($type_of_institutions); $i++) {
        $education = new Education([
            'user_id' => $user_id,
            'type_of_institution' => $type_of_institutions[$i],
            'name_of_institution' => $name_of_institutions[$i],
            'start_date' => $start_dates[$i],
            'end_date' => $end_dates[$i],
            'certificate_received' => $certificate_receiveds[$i],
            'field_of_study' => $field_of_studys[$i],
            'city' => $citys[$i],
            'country' => $countrys[$i],
        ]);
        $education->save();
    }
    Session::flash('success', 'Education record was added successfully');
    return redirect()->route('job_application.employment', ['id' => $job_id]);
}


public function employment($id)
{
    $job = JobProfile::where('job_id', $id)->first();
    $industries = Industry::orderBy('title', 'ASC')->get();

    return view('job_application.employment')
    ->with('job', $job)
    ->with('industries', $industries);
}


public function store_employment(Request $request) {
    $user_id = Auth::id();
    $job_id = $request->job_id;
    $data = $request->except(['_token', 'job_id']);

    $name_of_employers = $request->name_of_employer;
    $address_of_employers = $request->address_of_employer;
    $industries = $request->industry;
    $employment_starts = $request->employment_start;
    $employment_ends = $request->employment_end;
    $position_helds = $request->position_held;
    $name_of_supervisors = $request->name_of_supervisor;
    $title_of_supervisors = $request->title_of_supervisor;
    $category_of_employees_superviseds = $request->category_of_employees_supervised;
    $reason_for_leavings = $request->reason_for_leaving;
    $starting_salarys = $request->starting_salary;
    $salary_at_exits = $request->salary_at_exit;
    $description_of_dutiess = $request->description_of_duties;

    for($i = 0; $i < count($name_of_employers); $i++) {
        $employment = new Employment([
            'user_id' => $user_id,
            'name_of_employer' => $name_of_employers[$i],
            'address_of_employer' => $address_of_employers[$i],
            'industry' => $industries[$i],
            'name_of_supervisor' => $name_of_supervisors[$i],
            'title_of_supervisor' => $title_of_supervisors[$i],
            'employment_start' => $employment_starts[$i],
            'employment_end' => $employment_ends[$i],
            'position_held' => $position_helds[$i],
            'category_of_employees_supervised' => $category_of_employees_superviseds[$i],
            'reason_for_leaving' => $reason_for_leavings[$i],
            'starting_salary' => $starting_salarys[$i],
            'salary_at_exit' => $salary_at_exits[$i],
            'description_of_duties' => $description_of_dutiess[$i],
        ]);
        $employment->save();
    }
    Session::flash('success', 'Employment record was added successfully');
    return redirect()->route('job_application.professional_associations', ['id' => $job_id]);
}


public function professional_associations($id) {
    $job = JobProfile::where('job_id', $id)->first();
    return view('job_application.professional_association')
    ->with('job', $job);
}


public function store_professional_associations(Request $request) {
    $user_id = Auth::id();
    $job_id = $request->job_id;
    $data = $request->except(['_token', 'job_id']);

    $professional_bodys = $request->professional_body;
    $qualifications = $request->qualification;
    $date_attaineds = $request->date_attained;

    for($i = 0; $i < count($professional_bodys); $i++) {
        $professional_association = new ProfessionalAssociation([
            'user_id' => $user_id,
            'professional_body' => $professional_bodys[$i],
            'qualification' => $qualifications[$i],
            'date_attained' => $date_attaineds[$i]
        ]);
        $professional_association->save();
    }
    Session::flash('success', 'Professional Association record was added successfully');
    return redirect()->route('job_application.computer_skills', ['id' => $job_id]);
}


public function computer_skills($id) {
    $job = JobProfile::where('job_id', $id)->first();
    return view('job_application.computer_skills')
    ->with('job', $job);
}


public function store_computer_skills(Request $request)
{
    $user_id = Auth::id();
    $job_id = $request->job_id;
    $data = $request->except(['_token', 'job_id']);

    $skills = $request->skill;
    $levels = $request->level;
    
    for($i = 0; $i < count($skills); $i++) {
        $computer_skills = new TechnicalSkill([
            'user_id' => $user_id,
            'skill' => $skills[$i],
            'level' => $levels[$i],
        ]);
        $computer_skills->save();
    }
    Session::flash('success', 'Technical skills were added successfully');
    return redirect()->route('job_application.applicant_reference', ['id' => $job_id]);
}


public function applicant_reference($id) {
    $job = JobProfile::where('job_id', $id)->first();
    return view('job_application.applicant_references')
    ->with('job', $job);
}


public function store_applicant_reference(Request $request) {
    $user_id = Auth::id();
    $job_id = $request->job_id;
    $data = $request->except(['_token', 'job_id']);

    $name_of_references = $request->name_of_reference;
    $address_of_references = $request->address_of_reference;
    $email_of_references = $request->email_of_reference;
    $phone_of_references = $request->phone_of_reference;
    $relationships = $request->relationship;
    
    for($i = 0; $i < count($name_of_references); $i++) {
        $application_reference = new ApplicantReference([
            'user_id' => $user_id,
            'name_of_reference' => $name_of_references[$i],
            'address_of_reference' => $address_of_references[$i],
            'email_of_reference' => $email_of_references[$i],
            'phone_of_reference' => $phone_of_references[$i],
            'relationship' => $relationships[$i]
        ]);
        $application_reference->save();
    }
    Session::flash('success', 'Your references were added successfully');
    return redirect()->route('job_application.additional_info', ['id' => $job_id]);
}



public function additional_info($id)
{
    $job = JobProfile::where('job_id', $id)->first();
    return view('job_application.additional_info')
    ->with('job', $job);
}


public function store_additional_info(Request $request) {
    $user_id = Auth::id();
    $job_id = $request->job_id;
    $additional_info = new AdditionalInfo;
    $additional_info->user_id = $user_id;
    $additional_info->allow_to_contact_previous = $request->allow_to_contact_previous;
    $additional_info->criminal_conviction = $request->criminal_conviction;
    $additional_info->details_of_conviction = $request->details_of_conviction;
    $additional_info->availability = $request->availability;
    $additional_info->extra = $request->extra;
    $additional_info->save();
    $user = User::where('id', $user_id)->first();
    $user->completed_profile = 'yes';
    $user->save();

    Session::flash('success', 'Your job application was added successfully');
    return redirect()->route('job_application.complete', ['id' => $job_id]);

}


public function complete($id) {
    $job = JobProfile::where('job_id', $id)->first();
    return view('job_application.complete')
    ->with('job', $job);
}


}
