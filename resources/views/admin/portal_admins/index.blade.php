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
                                <h5 class="">Portal Admins</h5>

                                <div class="top_btn">
                                    <a href="{{ route('admin.portal_admins.create') }}" class="btn btn-primary btn-sm">Create Admin</a>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                <div class="table-responsive">
                                    @if(isset($admins) && $admins->count() > 0)
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="30%">Name</th>
                                                    <th width="30%">Email</th>
                                                    <th width="25%">Permission</th>
                                                    <th width="15%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($admins as $admin)
                                                <tr>
                                                    <td>{{ $admin->name }}</td>
                                                    <td>{{ $admin->email }}</td>
                                                    <td>{{ $admin->permission_title }}</td>
                                                
                                                    <td>
                                                        <div class="edit-btn-wrap">
                                                            
                                                            <div class="edit-btn">
                                                                <a href="{{ route('admin.portal_admins.edit', ['id' => $admin->id]) }}" title="Edit">
                                                                    <i class="la la-edit"></i> 
                                                                </a>
                                                            </div>

                                                            <div class="edit-btn">
                                                                <a href="{{ route('admin.portal_admins.change_password', ['id' => $admin->id]) }}" title="Edit">
                                                                    <i class="la la-lock"></i> 
                                                                </a>
                                                            </div>

                                                            <div class="edit-btn">
                                                                <a href="{{ route('admin.portal_admins.delete', ['id' => $admin->id]) }}" title="Delete">
                                                                    <i class="la la-trash"></i> 
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p>There are no admin profiles available</p>
                                    @endif
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
