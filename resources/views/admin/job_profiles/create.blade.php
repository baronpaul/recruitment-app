<?php

?>
@extends('admin.layouts.adminlayout')

@section('content')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    @include('admin.includes.sidebar');

    
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        <div class="widget-heading">
                            <div class="">
                                <h5 class="">Create Job Profile</h5>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="form_wrap">
                                <form action="{{ route('admin.job_profiles.store') }}" method="POST" class="forms-sample">
                                    {{ csrf_field() }}
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name_of_organization">Organization Name</label>
                                                <select name="organization_id" class="form-control">
                                                    <option></option>
                                                    @foreach($organizations as $org)
                                                    <option value="{{ $org->organization_id }}">{{ $org->name_of_organization }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="job_title">Job Title</label>
                                                <input type="text" name="job_title" class="form-control" 
                                                value="{{ old('job_title') }}" placeholder="Job Title">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="department">Department</label>
                                                <input type="text" name="department" class="form-control" 
                                                value="{{ old('department') }}" placeholder="Department">
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input type="text" name="location" class="form-control" 
                                                value="{{ old('location') }}" placeholder="Location">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="reporting_to">Reporting To</label>
                                                <input type="text" name="reporting_to" class="form-control" 
                                                value="{{ old('reporting_to') }}" placeholder="Reporting To">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="number_of_direct_subordinates">Number of Direct Subordinates</label>
                                                <select name="number_of_direct_subordinates" class="form-control">
                                                    <option value=""></option>
                                                    <?php
                                                        for ($a=2; $a < 100; $a++) { 
                                                            ?>
                                                            <option value="{{ $a }}">{{ $a }}</option>
                                                            <?php
                                                        }
                                                    ?>
                                                    <option value="100">over 100</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="job_calssification">Job Classification</label>
                                                <select name="job_classification" class="form-control">
                                                    <option></option>
                                                    <option value="executive">executive</option>
                                                    <option value="management">management</option>
                                                    <option value="senior staff">senior staff</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Reason For Vacancy</label>
                                                <input type="text" name="reason_for_vacancy" class="form-control" value="{{ old('reason_for_vacancy') }}" 
                                                placeholder="Reason For Vacancy">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Key Responsibilities</label>
                                                <textarea name="key_responsibilities" class="form-control" placeholder="Key Responsibilities" 
                                                rows="7"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="basic_educational_qualification">Basic Educational Qualification</label>
                                                <select class="form-control" name="basic_educational_qualification">
                                                    <option></option>
                                                    @foreach($educational_certificates as $certificate)
                                                        <option value="{{ $certificate->certificate_title }}">{{ $certificate->certificate_title }}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="professional_qualifications">Professional Qualifications</label>
                                                <input type="text" name="professional_qualifications" class="form-control" 
                                                value="{{ old('professional_qualifications') }}" 
                                                placeholder="Professional Qualifications">
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Competences Required</label>
                                                <textarea name="competences_required" class="form-control" placeholder="Competences Required" 
                                                rows="4"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Soft Skills Required</label>
                                                <textarea name="soft_skills_required" class="form-control" placeholder="Soft Skills Required" 
                                                rows="4"></textarea>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="years_of_experience">Years of Relevant Experience</label>
                                                <input type="number" name="years_of_experience" class="form-control" 
                                                value="{{ old('years_of_experience') }}" 
                                                placeholder="Years of Relevant Experience">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="annual_basic_salary">Annual Basic Salary</label>
                                                <input type="number" name="annual_basic_salary" class="form-control" 
                                                value="{{ old('annual_basic_salary') }}" 
                                                placeholder="Annual Basic Salary">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fringe_benefits">Fringe Benefits</label>
                                                <input type="text" name="fringe_benefits" class="form-control" 
                                                value="{{ old('fringe_benefits') }}" 
                                                placeholder="Fringe Benefits">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="other_benefits">Other Benefits</label>
                                                <input type="text" name="other_benefits" class="form-control" 
                                                value="{{ old('other_benefits') }}" 
                                                placeholder="Other Benefits">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="prepared_by">Prepared By</label>
                                                <input type="text" name="prepared_by" class="form-control" 
                                                value="{{ old('prepared_by') }}" 
                                                placeholder="Prepared By">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="position_held">Position Held</label>
                                                <input type="text" name="position_held" class="form-control" 
                                                value="{{ old('position_held') }}" 
                                                placeholder="Position Held">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <a hre="{{ route('admin.job_profiles') }}" class="btn btn-light">Cancel</a>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
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
