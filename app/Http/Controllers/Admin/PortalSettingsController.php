<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortalSettingsController extends Controller
{
    
protected $redirectTo = '/admin/login';


public function __construct()
{
    $this->middleware('admin.auth:admin');
}

public function index()
{
    //
}

public function show($id)
{
    //
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
