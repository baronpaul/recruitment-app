@extends('admin.layouts.adminlayout')

@section('content')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    @include('admin.includes.sidebar');

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        
                        <div class="widget-heading">
                            <div class="widget-head-ins">
                                <h5 class="">Change Password for Admins</h5>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                <div class="form_wrap">
                                    <form action="{{ route('admin.portal_admins.update') }}" method="POST" class="forms-sample">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="admin_id" value="{{ $admin->id }}">
                                        
                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" class="form-control" 
                                                    value="{{ $admin->name }}" placeholder="Name" readonly>
                                                </div>
                                            </div>
                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">New Password</label>
                                                    <input type="password" name="password" class="form-control" 
                                                     placeholder="Password">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password_confirmation">Confirm Password</label>
                                                    <input type="password" name="password_confirmation" class="form-control" 
                                                     placeholder="Confirm Password">
                                                </div>
                                            </div>
    
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                <a href="{{ route('admin.portal_admins.index') }}" class="btn btn-light">Cancel</a>
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        @include('admin.includes.footer');
        
    </div>
    <!--  END CONTENT PART  -->

</div>
<!-- END MAIN CONTAINER -->


@include('admin.includes.js_includes');

<script src="assets/plugins/apex/apexcharts.min.js"></script>
<script src="assets/js/dashboard/dash_2.js"></script>


@endsection
