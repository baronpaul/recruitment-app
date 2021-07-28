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
                                <h5 class="">Job Profile Detail</h5>
                            </div>

                            <div class="top_btn">
                                <a href="{{ route('admin.job_profiles') }}" class="btn btn-primary btn-sm">Back to Jobs</a>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                <div class="table table-striped">
                                    <table width="100%">
                                        <tr>
                                            <td width="30%">Title</td>
                                            <td width="70%">{{ $job_profile->job_title }}</td>
                                        </tr>

                                        <tr>
                                            <td>Department</td>
                                            <td>{{ $job_profile->department }}</td>
                                        </tr>

                                        <tr>
                                            <td>Number of Direct Subordinates</td>
                                            <td>{{ $job_profile->number_of_direct_subordinates }}</td>
                                        </tr>

                                        <tr>
                                            <td>Job Classification</td>
                                            <td>{{ $job_profile->job_classification }}</td>
                                        </tr>

                                        <tr>
                                            <td>Reason For Vacancy</td>
                                            <td>{{ $job_profile->reason_for_vacancy }}</td>
                                        </tr>

                                        <tr>
                                            <td>Key Responsibilities</td>
                                            <td>{{ $job_profile->key_responsibilities }}</td>
                                        </tr>

                                        <tr>
                                            <td>Basic Educational Qualification</td>
                                            <td>{{ $job_profile->basic_educational_qualification }}</td>
                                        </tr>

                                        <tr>
                                            <td>Professional Qualifications</td>
                                            <td>{{ $job_profile->professional_qualification }}</td>
                                        </tr>

                                        <tr>
                                            <td>Competences Required</td>
                                            <td>{{ $job_profile->years_of_experience }}</td>
                                        </tr>

                                        <tr>
                                            <td>Soft Skills Required</td>
                                            <td>{{ $job_profile->soft_skills_required }}</td>
                                        </tr>

                                        <tr>
                                            <td>Annual Basic Salary</td>
                                            <td>N{{ number_format($job_profile->annual_basic_salary,2) }}</td>
                                        </tr>

                                        <tr>
                                            <td>Fringe Benefits</td>
                                            <td>N{{ number_format($job_profile->fringe_benefits,2) }}</td>
                                        </tr>

                                        <tr>
                                            <td>Special Benefits</td>
                                            <td>{{ $job_profile->special_benefits }}</td>
                                        </tr>

                                        <tr>
                                            <td>Other Benefits</td>
                                            <td>{{ $job_profile->other_benefits }}</td>
                                        </tr>

                                        <tr>
                                            <td>Prepared By</td>
                                            <td>{{ $job_profile->prepared_by }}</td>
                                        </tr>

                                        <tr>
                                            <td>Position Held</td>
                                            <td>{{ $job_profile->position_held }}</td>
                                        </tr>
                                    </table>
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
