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
                    <div class="row widget-statistic">
                        
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <i class="la la-home"></i>
                                    </div>
                                    <p class="w-value">{{ $organizations->count() }}</p>
                                    <h5 class="">Organizations</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12">
                            <div class="widget widget-one_hybrid widget-referral">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <i class="la la-briefcase"></i>
                                    </div>
                                    <p class="w-value">{{ $job_profiles->count() }}</p>
                                    <h5 class="">Job Profiles</h5>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12">
                            <div class="widget widget-one_hybrid widget-engagement">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <i class="la la-file"></i>
                                    </div>
                                    <p class="w-value">{{ $job_application_count }}</p>
                                    <h5 class="">Job Applications</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12">
                            <div class="widget widget-one_hybrid widget-followers">
                                <div class="widget-heading">
                                    <div class="w-icon">
                                        <i class="la la-users"></i>
                                    </div>
                                    <p class="w-value">{{ $users_count }}</p>
                                    <h5 class="">Users</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        <div class="widget-heading">
                            <div class="">
                                <h5 class="">Organizations</h5>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                <div class="table-responsive">
                                    @if(isset($organizations) && $organizations->count() > 0)
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name of Org</th>
                                                <th>Email</th>
                                                <th>Nature of Business</th>
                                                <th>Year Established</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($organizations as $organization)
                                            <tr>
                                                <td>{{ $organization->name_of_organization }}</td>
                                                <td>{{ $organization->email }}</td>
                                                <td>{{ $organization->nature_of_business }}</td>
                                                <td>{{ $organization->year_established }}</td>
                                                <td>
                                                    <div class="edit-btn-wrap">
                                                        <div class="edit-btn">
                                                            <a href="{{ route('admin.organizations.detail', ['id' => $organization->organization_id]) }}" title="Detail">
                                                                <i class="la la-eye"></i> 
                                                            </a>
                                                        </div>

                                                        <div class="edit-btn">
                                                            <a href="{{ route('admin.organizations.edit', ['id' => $organization->organization_id]) }}" title="Edit">
                                                                <i class="la la-edit"></i> 
                                                            </a>
                                                        </div>

                                                        <div class="edit-btn">
                                                            <a href="{{ route('admin.organizations.delete', ['id' => $organization->organization_id]) }}" title="Delete">
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


                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        <div class="widget-heading">
                            <div class="">
                                <h5 class="">Job Profiles</h5>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                <div class="table-responsive">
                                    @if(isset($job_profiles) && $job_profiles->count() > 0)
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="25%">Name of Organization</th>
                                                    <th width="20%">Job Title</th>
                                                    <th width="15%">Location</th>
                                                    <th width="10%">Status</th>
                                                    <th width="10%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($job_profiles as $job)
                                                <tr>
                                                    <td>{{ $job->name_of_organization }}</td>
                                                    <td>{{ $job->job_title }}</td>
                                                    <td>{{ $job->location }}</td>
                                                    <td>{{ $job->job_status }}</td>
                                                    <td>
                                                        <div class="edit-btn-wrap">
                                                            <div class="edit-btn">
                                                                <a href="{{ route('admin.job_profiles.detail', ['id' => $job->job_id]) }}" title="Detail">
                                                                    <i class="la la-eye"></i> 
                                                                </a>
                                                            </div>

                                                            <div class="edit-btn">
                                                                <a href="{{ route('admin.job_profiles.edit', ['id' => $job->job_id]) }}" title="Edit">
                                                                    <i class="la la-edit"></i> 
                                                                </a>
                                                            </div>

                                                            <div class="edit-btn">
                                                                <a href="{{ route('admin.job_profiles.delete', ['id' => $job->job_id]) }}" title="Delete">
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
                                        <p>There are no job profiles available</p>
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
