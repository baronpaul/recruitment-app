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
                                    <table width="100%">
                                        <tr>
                                            <td width="20%">Name</td>
                                            <td width="80%">{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</td>
                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>

                                        <tr>
                                            <td>Telephone</td>
                                            <td>{{ $user->telephone }}</td>
                                        </tr>

                                        <tr>
                                            <td>Date of Birth</td>
                                            <td>{{ $user->date_of_birth }}</td>
                                        </tr>

                                        <tr>
                                            <td>Sex</td>
                                            <td>{{ $user->sex }}</td>
                                        </tr>

                                        <tr>
                                            <td>Nationality</td>
                                            <td>{{ $user->nationality }}</td>
                                        </tr>

                                        <tr>
                                            <td>Marital Status</td>
                                            <td>{{ $user->marital_status }}</td>
                                        </tr>

                                        <tr>
                                            <td>Permanent Address</td>
                                            <td>{{ $user->permanent_address }}</td>
                                        </tr>

                                        <tr>
                                            <td>Current Address</td>
                                            <td>{{ $user->current_address }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        
                        <div class="widget-heading">
                            <div class="widget-head-ins">
                                <h5 class="">Education</h5>
                            </div>
                        </div>
                        @foreach($educations as $education)
                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                <div class="table table-striped">
                                    <table width="100%">
                                        <tr>
                                            <td width="20%">Type of Institution</td>
                                            <td width="80%">{{ $education->type_of_institution }}</td>
                                        </tr>

                                        <tr>
                                            <td>Name of Institution</td>
                                            <td>{{ $education->name_of_institution }}</td>
                                        </tr>

                                        <tr>
                                            <td>Dates</td>
                                            <td>{{ $education->start_date }} - {{ $education->end_date }}</td>
                                        </tr>

                                        <tr>
                                            <td>Certificate Received</td>
                                            <td>{{ $education->certificate_received }}</td>
                                        </tr>

                                        <tr>
                                            <td>Field of Study</td>
                                            <td>{{ $education->field_of_study }}</td>
                                        </tr>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        
                        <div class="widget-heading">
                            <div class="widget-head-ins">
                                <h5 class="">Employment History</h5>
                            </div>
                        </div>
                        @foreach($employments as $employment)
                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                <div class="table table-striped">
                                    <table width="100%">
                                        <tr>
                                            <td width="20%">Name of Employer</td>
                                            <td width="80%">{{ $employment->name_of_employer }}</td>
                                        </tr>

                                        <tr>
                                            <td>Address of Employer</td>
                                            <td>{{ $employment->name_of_institution }}</td>
                                        </tr>

                                        <tr>
                                            <td>Type of Business</td>
                                            <td>{{ $employment->type_of_business }}</td>
                                        </tr>

                                        <tr>
                                            <td>Position Held</td>
                                            <td>{{ $employment->position_held }}</td>
                                        </tr>

                                        <tr>
                                            <td>Category of Employees Supervised</td>
                                            <td>{{ $employment->category_of_employees_supervised }}</td>
                                        </tr>

                                        <tr>
                                            <td>Employment Start</td>
                                            <td>{{ $employment->employment_start }}</td>
                                        </tr>

                                        <tr>
                                            <td>Employment End</td>
                                            <td>{{ $employment->employment_end }}</td>
                                        </tr>

                                        <tr>
                                            <td>Name of Supervisor</td>
                                            <td>{{ $employment->name_of_supervisor }}</td>
                                        </tr>

                                        <tr>
                                            <td>Title of Supervisor</td>
                                            <td>{{ $employment->title_of_supervisor }}</td>
                                        </tr>

                                        <tr>
                                            <td>Starting Salary</td>
                                            <td>N{{ number_format($employment->starting_salary,2) }}</td>
                                        </tr>

                                        <tr>
                                            <td>Salary at Exit</td>
                                            <td>N{{ number_format($employment->salary_at_exit,2) }}</td>
                                        </tr>

                                        <tr>
                                            <td>Reason for Leaving</td>
                                            <td>{{ $employment->reason_for_leaving }}</td>
                                        </tr>

                                        <tr>
                                            <td>Description of Duties</td>
                                            <td>{{ $employment->description_of_duties }}</td>
                                        </tr>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        
                        <div class="widget-heading">
                            <div class="widget-head-ins">
                                <h5 class="">Professional Association</h5>
                            </div>
                        </div>
                        @foreach($professional_associations as $professional)
                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                <div class="table table-striped">
                                    <table width="100%">
                                        <tr>
                                            <td width="20%">Professional Body</td>
                                            <td width="80%">{{ $professional->professional_body }}</td>
                                        </tr>

                                        <tr>
                                            <td>Qualification Earned</td>
                                            <td>{{ $professional->qualiification }}</td>
                                        </tr>

                                        <tr>
                                            <td>Date Attained</td>
                                            <td>{{ $professional->date_attained }}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        
                        <div class="widget-heading">
                            <div class="widget-head-ins">
                                <h5 class="">Computer Skills</h5>
                            </div>
                        </div>
                        @foreach($computer_skills as $computer_skill)
                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                <div class="table table-striped">
                                    <table width="100%">
                                        <tr>
                                            <td width="20%">Computer Skill</td>
                                            <td width="80%">{{ $computer_skill->skill }}</td>
                                        </tr>

                                        <tr>
                                            <td>Level</td>
                                            <td>{{ $computer_skill->level }}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        
                        <div class="widget-heading">
                            <div class="widget-head-ins">
                                <h5 class="">Applicant References</h5>
                            </div>
                        </div>
                        @foreach($applicant_references as $reference)
                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                <div class="table table-striped">
                                    <table width="100%">
                                        <tr>
                                            <td width="20%">Name of Reference</td>
                                            <td width="80%">{{ $reference->name_of_reference }}</td>
                                        </tr>

                                        <tr>
                                            <td>Address</td>
                                            <td>{{ $reference->address_of_reference }}</td>
                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $reference->email_of_reference }}</td>
                                        </tr>

                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $reference->phone_of_reference }}</td>
                                        </tr>

                                        <tr>
                                            <td>Relationship</td>
                                            <td>{{ $reference->relationship }}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
