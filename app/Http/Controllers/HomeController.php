<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use Session;

use Mail;

use App\User;

use App\JobProfile;

use App\Organization;

class HomeController extends Controller
{
    
public function index()
{
    $jobs = JobProfile::join('organizations', 'organizations.organization_id', '=', 'job_profiles.organization_id')
    ->get();

    return view('home')
    ->with('jobs', $jobs);
}

public function employers()
{
    return view('employers');
}


public function jobseekers()
{
    $jobs = JobProfile::join('organizations', 'organizations.organization_id', '=', 'job_profiles.organization_id')
    ->get();

    return view('jobseekers')
    ->with('jobs', $jobs);
}


public function jobs()
{
    $jobs = JobProfile::join('organizations', 'organizations.organization_id', '=', 'job_profiles.organization_id')
    ->get();

    return view('jobs')
    ->with('jobs', $jobs);
}


public function job_detail($url)
{
    $job = JobProfile::join('organizations', 'organizations.organization_id', '=', 'job_profiles.organization_id')
    ->where('job_profiles.job_url', '=', $url)
    ->first();

    return view('job-detail')
    ->with('job', $job);
}


    
}
