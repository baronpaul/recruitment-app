<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use Session;

use Mail;

use App\Admin;

use App\Permission;

use App\Organization;

use App\JobProfile;

use App\JobApplication;

use App\User;


class AdminHomeController extends Controller
{

protected $redirectTo = '/admin/login';


public function __construct()
{
    $this->middleware('admin.auth:admin');
}


public function index() {
    $organizations = Organization::all();

    $job_profiles = JobProfile::join('organizations', 'organizations.organization_id', '=', 'job_profiles.organization_id')
    ->get();

    $job_application_count = JobApplication::count();

    $users_count = User::count();

    return view('admin.home')
    ->with('organizations', $organizations)
    ->with('job_profiles', $job_profiles)
    ->with('job_application_count', $job_application_count)
    ->with('users_count', $users_count);
}

}