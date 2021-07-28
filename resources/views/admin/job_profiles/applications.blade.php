@extends('admin.layouts.adminlayout')

@section('content')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    @include('admin.includes.sidebar');

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            
            @include('admin.includes.job_profile_nav')
            
            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        
                        <div class="widget-heading">
                            <div class="">
                                <h5 class="">Job Applications for {{ $job_profile->job_title }} at {{ $job_profile->name_of_organization }}</h5>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                <div class="table table-striped">
                                    @if(isset($job_applications) && $job_applications->count() > 0)
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="30%">Name</th>
                                                    <th width="15%">Email</th>
                                                    <th width="15%">Phone</th>
                                                    <th width="8%">Sex</th>
                                                    <th width="17%">Date of Birth</th>
                                                    <th width="10%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($job_applications as $job_application)
                                                <tr>
                                                    <td>{{ $job_application->firstname }} {{ $job_application->middlename }} {{ $job_application->lastname }}</td>
                                                    <td>{{ $job_application->email }}</td>
                                                    <td>{{ $job_application->telephone }}</td>
                                                    <td>{{ $job_application->sex }}</td>
                                                    <td>{{ $job_application->date_of_birth }}</td>
                                                    <td>
                                                        <div class="edit-btn-wrap">
                                                            <div class="edit-btn">
                                                                <a href="{{ route('admin.job_applications.detail', ['id' => $job_application->id]) }}" title="Detail">
                                                                    <i class="la la-eye"></i> 
                                                                </a>
                                                            </div>

                                                            <div class="edit-btn">
                                                                <a href="{{ route('admin.job_applications.suspend', ['id' => $job_application->id]) }}" title="Suspend Account">
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
                                    <p>There are no organizations added</p>
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
