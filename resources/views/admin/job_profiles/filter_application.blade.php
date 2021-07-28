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
                                <h5 class="">Filter Applications for {{ $job_profile->job_title }} at {{ $job_profile->name_of_organization }}</h5>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                <div class="form_wrap">
                                    <form action="{{ route('admin.job_applications.do_filter') }}" method="POST" class="forms-sample">
                                        {{ csrf_field() }}
                                        
                                        <input type="hidden" name="job_id" value="{{ $job_profile->job_id }}">
    
                                        <div class="row">
                                            
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="industry">Industry</label>
                                                    <select name="industry" class="form-control">
                                                        <option></option>
                                                        @foreach($industries as $industry)
                                                            <option value="{{ $industry->title }}">{{ $industry->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="years_of_experience">Years of Experience</label>
                                                    <input type="text" name="years_of_experience" class="form-control" 
                                                    value="" placeholder="Years of Experience">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="academic_qualification">Minimum Academic Qualification</label>
                                                    <select name="academic_qualification" class="form-control">
                                                        <option></option>
                                                        @foreach($educational_certs as $academic_qual)
                                                            <option value="{{ $academic_qual->certificate_rating }}">
                                                                {{ $academic_qual->certificate_title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="professional_qualifications">Professional qualifications</label>
                                                    <input type="text" name="professional_qualifications" class="form-control" 
                                                    value="" placeholder="Professional qualifications">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="technical_skills">Technical Skills</label>
                                                    <input type="text" name="technical_skills" class="form-control" 
                                                    value="" placeholder="Technical Skills">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="key_words">Work Experience Key Words</label>
                                                    <input type="text" name="key_words" class="form-control" 
                                                    value="" placeholder="Work Experience Key Words">
                                                </div>
                                            </div>
    
    
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary mr-2">Filter</button>
                                                <a hre="{{  route('admin.job_profiles')}}" class="btn btn-light">Cancel</a>
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
