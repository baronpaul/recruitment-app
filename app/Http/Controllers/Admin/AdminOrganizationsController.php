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


class AdminOrganizationsController extends Controller
{
    
protected $redirectTo = '/admin/login';


public function __construct()
{
    $this->middleware('admin.auth:admin');
}

public function index()
{
    $organizations = Organization::all();

    return view('admin.organizations.index')
    ->with('organizations', $organizations);
}


public function create()
{
    return view('admin.organizations.create');
}


public function store(Request $request)
{
    $this->validate($request, [
        'name_of_organization' => 'required',
        'email' => 'required',
        'email' => 'required',
    ]);

    $organization = new Organization;

    $organization->name_of_organization = $request->name_of_organization;
    $organization->email = $request->email;
    $organization->nature_of_business = $request->nature_of_business;
    $organization->sector_of_operation = $request->sector_of_operation;
    $organization->year_established = $request->year_established;
    $organization->staff_strenght = $request->staff_strenght;
    $organization->annual_turnover = $request->annual_turnover;
    $organization->profit_before_tax = $request->profit_before_tax;
    $organization->save();

    Session::flash('success', 'Organization was added successfully');
    return redirect()->route('admin.organizations');
}


public function detail($id)
{
    $organization = Organization::where('organization_id', $id)->first();

    return view('admin.organizations.detail')
    ->with('organization', $organization);
}


public function edit($id)
{
    $organization = Organization::where('organization_id', $id)->first();

    return view('admin.organizations.edit')
    ->with('organization', $organization);
}


public function update(Request $request)
{
    $organization = Organization::where('organization_id', $request->organization_id)->first();

    $organization->name_of_organization = $request->name_of_organization;
    $organization->email = $request->email;
    $organization->nature_of_business = $request->nature_of_business;
    $organization->sector_of_operation = $request->sector_of_operation;
    $organization->year_established = $request->year_established;
    $organization->staff_strenght = $request->staff_strenght;
    $organization->annual_turnover = $request->annual_turnover;
    $organization->profit_before_tax = $request->profit_before_tax;
    $organization->save();

    Session::flash('success', 'Organization was updated successfully');
    return redirect()->route('admin.organizations');
}


public function delete($id)
{
    $organization = Organization::where('organization_id', $id)->first();

    return view('admin.organizations.delete')
    ->with('organization', $organization);
}


public function destroy(Request $request)
{
    $organization = Organization::where('organization_id', $request->organization_id)->first();
    $organization->delete();

    Session::flash('success', 'Organization was deleted successfully');
    return redirect()->route('admin.organizations');
}


}
