@php
    $website_title = 'Lines and Pegs :: Home page';
    $description = 'Lines & Pegs website';
    $meta_tags = '';
@endphp

@extends('layouts.mainlayout')

@section('content')

<div class="section sm pb-80" style="min-height:100vh">

    <div class="container">
    
        <div class="row">
        
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            
                <div class="section-title">
                
                    <h2 class="text-center">Job Detail</h2>
                    
                </div>

            </div>
        
        </div>
        
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                @include('includes.notifications')
                <div class="job-detail-wrapper">
                    <div class="job-detail-header text-center">
											
                        <h2 class="heading mb-15">{{ $job->job_title }}</h2>
                    
                        <div class="meta-div clearfix mb-25">
                            <span>at <a href="#">{{ $job->name_of_organization }}</a> as </span>
                            <span class="job-label label label-success">{{ $job->job_classification }}</span>
                        </div>
                        
                        <ul class="meta-list clearfix">
                            <li>
                                <h4 class="heading">Department:</h4>
                                {{ $job->department }}
                            </li>
                            <li>
                                <h4 class="heading">Location:</h4>
                                {{ $job->location }}
                            </li>
                            <li>
                                <h4 class="heading">Annual Basic Salary:</h4>
                                N{{ number_format($job->annual_basic_salary,2) }}
                            </li>
                            <li>
                                <h4 class="heading">Experience</h4>
                                {{ $job->years_of_experience }} years
                            </li>
                            
                        </ul>
                        
                    </div>
        
                    
                    <div class="job-detail-content mt-30 clearfix">
                       
                        <h4>Key Responsibilies</h4>
                        {!! $job->key_responsibilities !!}
                        
                        <h4>Basic Educational Qualifications:</h4>
                        {{ $job->basic_educational_qualification }}

                        <h4>Professional Qualifications:</h4>
                        {{ $job->professional_qualifications }}

                        <h4>Additional Skills Required:</h4>
                        {{ $job->competences_required }}
                    
                    </div>
                    
                    <div class="apply-job-wrapper">
                        <a href="{{ route('job_application.start', ['url' => $job->job_url]) }}" class="btn btn-info">Apply for this job</a>
                    </div>
                </div>
            </div>
            
        </div>

    </div>

</div>

@include('includes.footer')
		
</div>

</div> 

@include('includes.js_includes')

@stop
