<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use App\Education;

use App\Employment;

use App\ProfessionalAssociation;

use App\TechnicalSkill;

use App\ApplicantReference;

use App\AdditionalInfo;


class AdminUsersController extends Controller
{

protected $redirectTo = '/admin/login';


public function __construct()
{
    $this->middleware('admin.auth:admin');
}

public function index()
{
    $users = User::all();
    return view('admin.users.index')
    ->with('users', $users);
}



public function detail($id)
{
    $user = User::where('id', $id)->first();
    $educations = Education::where('user_id', $id)->get();
    $employments = Employment::where('user_id', $id)->get();
    $professional_associations = ProfessionalAssociation::where('user_id', $id)->get();
    $computer_skills = TechnicalSkill::where('user_id', $id)->get();
    $applicant_references = ApplicantReference::where('user_id', $id)->get();
    $additional_info = AdditionalInfo::where('user_id', $id)->first();

    return view('admin.users.detail')
    ->with('user', $user)
    ->with('educations', $educations)
    ->with('employments', $employments)
    ->with('professional_associations', $professional_associations)
    ->with('computer_skills', $computer_skills)
    ->with('applicant_references', $applicant_references)
    ->with('additional_info', $additional_info);
}


public function edit($id)
{
    //
}


public function update(Request $request, $id)
{
    //
}

    
}
