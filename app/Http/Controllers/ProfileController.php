<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use Session;

use Mail;

use Image;

use App\User;

use App\JobProfile;

use App\Organization;

use App\Education;

use App\EducationalCertificate;

use App\Employment;

use App\ProfessionalAssociation;

use App\TechnicalSkill;

use App\ApplicantReference;

use App\AdditionalInfo;

use App\Industry;


class ProfileController extends Controller
{


public function index() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();

    return view('profile.index')
    ->with('user', $user);
}


public function edit() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();

    return view('profile.edit')
    ->with('user', $user);
}


public function update(Request $request) {
    $user_id = Auth::id();
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
    $user->completed_profile = 'yes';

    $user->save();
    Session::flash('success', 'You have succesfullly updated your profile');
    return redirect()->route('profile');
}


public function edit_profile_pic() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();

    return view('profile.edit_profile_pic')
    ->with('user', $user);
}


public function update_profile_pic(Request $request) {
    $this->validate($request, [
        'profile_pic' => 'required|image'
    ]); 

    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();

    $file = $request->profile_pic;
    $newImageName = 'uploads/'.time().$file->getClientOriginalName();
    $img = Image::make($file)->orientate()
    ->fit(400, 400, function ($constraint) {
        $constraint->upsize();
    })
    ->save($newImageName, 60);

    $user->profile_pic = $newImageName;
    $user->save();

    Session::flash('success', 'You have succesfully updated your profile picture');
    return redirect()->route('profile');
}


public function change_password() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();

    return view('profile.change_password')
    ->with('user', $user);
}


public function update_password(Request $request) {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();

    $curr_password = $user->password;
    $old_password = bcrypt($request->old_password);

    if($old_password == $curr_password) {
        $user->password = bcrypt($request->password);
        $user->save();

        Session::flash('success', 'You have succesfullly updated your password');
        return redirect()->route('profile');
    }
    else {
        Session::flash('success', 'The old password you entered is not correct. Please try again');
        return redirect()->route('profile.change_password');
    }
    
}


public function upload_resume() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();

    return view('profile.upload_resume')
    ->with('user', $user);
}


public function do_upload_resume(Request $request) {
    $this->validate($request, [
        'resume' => 'required|max:10000'
    ]); 

    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();

    if($request->hasFile('resume')) {
        $document_resume = $request->resume;
        $document_resume_new_name = time().$document_resume->getClientOriginalName();
        $document_resume->move('uploads/documents/', $document_resume_new_name);
        $user->resume = 'uploads/documents/'.$document_resume_new_name;
    }
    $user->save();
    Session::flash('success', 'You have succesfully uploaded your resume');
    return redirect()->route('profile');
}


public function education() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    $educations = Education::where('educations.user_id','=', $user_id)
    ->join('educational_certificates', 'educational_certificates.certificate_rating', '=', 'educations.certificate_received')
    ->get();

    return view('profile.education')
    ->with('user', $user)
    ->with('educations', $educations);
}


public function add_education() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    $educational_certificates = EducationalCertificate::all();

    return view('profile.add_education')
    ->with('user', $user)
    ->with('educational_certificates', $educational_certificates);
}


public function store_education(Request $request) {
    $user_id = Auth::id();
    
    $data = $request->except(['_token']);
    $type_of_institutions = $request->type_of_institution;
    $name_of_institutions = $request->name_of_institution;
    $address_of_institutions = $request->address_of_institution;
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
            'address_of_institution' => $address_of_institutions[$i],
            'start_date' => $start_dates[$i],
            'end_date' => $end_dates[$i],
            'certificate_received' => $certificate_receiveds[$i],
            'field_of_study' => $field_of_studys[$i],
            'city' => $citys[$i],
            'country' => $countrys[$i],
        ]);
        $education->save();
    }

    $user = User::where('id', $user_id)->first();
    $user->education = 'yes';
    $user->save();

    Session::flash('success', 'Education record was added successfully');
    return redirect()->route('profile.education');
}


public function edit_education($id) {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    $education = Education::where('education_id', $id)->first();
    $educational_certificates = EducationalCertificate::all();

    return view('profile.edit_education')
    ->with('user', $user)
    ->with('education', $education)
    ->with('educational_certificates', $educational_certificates);
}


public function update_education(Request $request) {
    $education = Education::where('education_id', $request->education_id)->first();

    $education->type_of_institution = $request->type_of_institution;
    $education->name_of_institution = $request->name_of_institution;
    $education->address_of_institution = $request->address_of_institution;
    $education->start_date = $request->start_date;
    $education->end_date = $request->end_date;
    $education->certificate_received = $request->certificate_received;
    $education->field_of_study = $request->field_of_study;
    $education->city = $request->city;
    $education->country = $request->country;

    $education->save();

    Session::flash('success', 'Your education details was updated successfully');
    return redirect()->route('profile.education');
}


public function employment() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    $employments = Employment::where('user_id', $user_id)->get();

    return view('profile.employment')
    ->with('user', $user)
    ->with('employments', $employments);
}


public function add_employment() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    $industries = Industry::orderBy('title', 'ASC')->get();

    return view('profile.add_employment')
    ->with('user', $user)
    ->with('industries', $industries);
}


public function store_employment(Request $request) {
    $user_id = Auth::id();
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
    
    $user = User::where('id', $user_id)->first();
    $user->employment = 'yes';
    $user->save();

    Session::flash('success', 'Employment record was added successfully');
    return redirect()->route('profile.employment');
}



public function edit_employment($id) {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    $employment = Employment::where('employment_id', $id)->first();
    $industries = Industry::orderBy('title', 'ASC')->get();

    return view('profile.edit_employment')
    ->with('user', $user)
    ->with('employment', $employment)
    ->with('industries', $industries);
}


public function update_employment(Request $request) {
    $employment = Employment::where('employment_id', $request->employment_id)->first();

    $employment->name_of_employer = $request->name_of_employer;
    $employment->address_of_employer = $request->address_of_employer;
    $employment->industry = $request->industry;
    $employment->employment_start = $request->employment_start;
    $employment->employment_end = $request->employment_end;
    $employment->position_held = $request->position_held;
    $employment->name_of_supervisor = $request->name_of_supervisor;
    $employment->title_of_supervisor = $request->title_of_supervisor;
    $employment->category_of_employees_supervised = $request->category_of_employees_supervised;
    $employment->reason_for_leaving = $request->reason_for_leaving;
    $employment->starting_salary = $request->starting_salary;
    $employment->salary_at_exit = $request->salary_at_exit;
    $employment->description_of_duties = $request->description_of_duties;

    $employment->save();
    Session::flash('success', 'Your education details was updated successfully');
    return redirect()->route('profile.employment');

}


public function professional_associations() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    $professional_associations = ProfessionalAssociation::where('user_id', $user_id)->get();

    return view('profile.professional_associations')
    ->with('user', $user)
    ->with('professional_associations', $professional_associations);
}


public function add_professional_association() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    return view('profile.add_professional_association')
    ->with('user', $user);
}


public function store_professional_association() {
    $user_id = Auth::id();
    
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
    
    $user = User::where('id', $user_id)->first();
    $user->professional_certifications = 'yes';
    $user->save();
    
    Session::flash('success', 'Professional Association record was added successfully');
    return redirect()->route('profile.computer_skills', ['id' => $job_id]);
}


public function edit_professional_association($id) {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    $professional_association = ProfessionalAssociation::where('ps_id', $id)->first();

    return view('profile.edit_professional_association')
    ->with('user', $user)
    ->with('professional_association', $professional_association);
}


public function update_professional_association(Request $request) {
    $professional_association = ProfessionalAssociation::where('ps_id', $request->ps_id)->first();

    $professional_association->professional_body = $request->professional_body;
    $professional_association->qualification = $request->qualification;
    $professional_association->date_attained = $request->date_attained;
    $professional_association->save();

    Session::flash('success', 'Your professional association data was updated successfully');
    return redirect()->route('profile.professional_associations');
}


public function computer_skills() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    $computer_skills = TechnicalSkill::where('user_id', $user_id)->get();

    return view('profile.computer_skills')
    ->with('user', $user)
    ->with('computer_skills', $computer_skills);
}


public function add_computer_skills() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();

    return view('profile.add_computer_skills')
    ->with('user', $user);
}


public function store_computer_skills(Request $request) {
    $user_id = Auth::id();
    
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
    
    $user = User::where('id', $user_id)->first();
    $user->technical_skills = 'yes';
    $user->save();

    Session::flash('success', 'Technical skills were added successfully');
    return redirect()->route('profile.computer_skills');
}


public function edit_computer_skill($id) {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    $computer_skill = TechnicalSkill::where('skill_id', $id)->first();

    return view('profile.edit_computer_skill')
    ->with('computer_skill', $computer_skill);
}


public function update_computer_skill(Request $request) {
    $computer_skill = TechnicalSkill::where('skill_id', $request->skill_id)->first();

    $computer_skill->skill = $request->skill;
    $computer_skill->level = $request->level;
    $computer_skill->save();

    Session::flash('success', 'Your computer skill was updated successfully');
    return redirect()->route('profile.computer_skills');
}


public function applicant_references() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    
    $applicant_references = ApplicantReference::where('user_id', $user_id)->get();

    return view('profile.applicant_references')
    ->with('user', $user)
    ->with('applicant_references', $applicant_references);
}


public function add_applicant_references() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    return view('profile.add_applicant_reference');
}


public function store_applicant_references() {
    $user_id = Auth::id();
    
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
    
    $user = User::where('id', $user_id)->first();
    $user->applicant_references = 'yes';
    $user->save();

    Session::flash('success', 'Your references were added successfully');
    return redirect()->route('profile.applicant_reference');
}


public function edit_applicant_reference($id) {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    $reference = ApplicantReference::where('reference_id', $id)->first();

    return view('profile.edit_applicant_reference')
    ->with('user', $user)
    ->with('reference', $reference);
}


public function update_applicant_reference(Request $request) {
    
}


public function delete_applicant_reference($id) {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    $reference = ApplicantReference::where('reference_id', $id)->first();

    return view('profile.delete_applicant_reference')
    ->with('reference', $reference);
}


public function destroy_applicant_reference(Request $request) {
    $reference = ApplicantReference::where('reference_id', $request->reference_id)->first();
    $reference->delete();

    Session::flash('success', 'Your references were added successfully');
    return redirect()->route('profile.applicant_reference');
}


public function additional_info() {
    $user_id = Auth::id();
    $user = User::where('id', $user_id)->first();
    $additional_info = AdditionalInfo::where('user_id', $user_id)->first();

    return view('profile.additional_info')
    ->with('user', $user)
    ->with('additional_info', $additional_info);
}


public function add_additional_info() {
    return view('profile.add_additional_info');
}


public function store_additional_info() {
    $user_id = Auth::id();
    
    $additional_info = new AdditionalInfo;
    $additional_info->user_id = $user_id;
    $additional_info->allow_to_contact_previous = $request->allow_to_contact_previous;
    $additional_info->criminal_conviction = $request->criminal_conviction;
    $additional_info->details_of_conviction = $request->details_of_conviction;
    $additional_info->availability = $request->availability;
    $additional_info->extra = $request->extra;
    $additional_info->save();

    $user = User::where('id', $user_id)->first();
    $user->additional_info = 'yes';
    $user->save();

    Session::flash('success', 'Your job application was added successfully');
    return redirect()->route('profile.additional_info');
}


public function edit_additional_info($id) {
    $user_id = Auth::id();
    $additional_info = AdditionalInfo::where('additional_info_id', $id)->first();

    return view('profile.edit_additional_info')
    ->with('additional_info', $additional_info);
}


public function update_additional_info(Request $request) {
    $user_id = Auth::id();

    $additional_info = AdditionalInfo::where('additional_info_id', $request->additional_info_id)->first();
    $additional_info->user_id = $user_id;
    $additional_info->allow_to_contact_previous = $request->allow_to_contact_previous;
    $additional_info->criminal_conviction = $request->criminal_conviction;
    $additional_info->details_of_conviction = $request->details_of_conviction;
    $additional_info->availability = $request->availability;
    $additional_info->extra = $request->extra;
    $additional_info->save();

    Session::flash('success', 'Your job application was added successfully');
    return redirect()->route('profile.additional_info');
}


}
