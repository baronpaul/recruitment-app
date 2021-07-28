@php
    $website_title = 'Lines and Pegs :: Home page';
    $description = 'Lines & Pegs website';
    $meta_tags = '';
@endphp

@extends('layouts.mainlayout')

@section('content')

<div class="banner">
    <div class="banner_ins">
        
        <div class="banner_img">
            <img src="{{ asset('images/banner01.png') }}" />
        </div>
    
        <div class="banner_txt">
            <h2 class="caps">Modern Recruitment<br> Built To boost Hiring Performance</h2>
            <div class="banner_txt_btns">
                <a href="{{ route('employers') }}" class="btn btn-info">Post a Job Opening</a>
                <a href="{{ route('jobseekers') }}" class="btn btn-primary">View Job Openings</a>
             </div>
        </div>
        
    </div>
</div>

<div class="section sm pb-80" style="">
    <div class="container">
        <div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
            <h2 class="">
                Welcome to RecruitPro
            </h2>
            <p class="light medium_txt">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime optio distinctio exercitationem amet quas dolore ad in debitis. Aut odio, quibusdam ipsum sed nihil nam minima tenetur id ratione debitis?
            </p>
        </div>
    </div>
</div>

<div class="section sm pb-80" style="padding-top: 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="box light-blue">
                    <div class="box_ins">
                        <h3><i class="fa fa-building"></i> For Employers</h3>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima tenetur, magnam, commodi autem alias doloribus saepe excepturi eum rem atque voluptatem quas labore odit officia est consequatur, aliquid distinctio ea.
                        </p>
                        <a href="#" class="btn btn-dark">Find Talent</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box dark-blue">
                    <div class="box_ins">
                        <h3><i class="fa fa-user"></i> For Job Seekers</h3>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima tenetur, magnam, commodi autem alias doloribus saepe excepturi eum rem atque voluptatem quas labore odit officia est consequatur, aliquid distinctio ea.
                        </p>
                        <a href="#" class="btn btn-primary">Get Hired</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section sm pb-80" style="background-color:rgba(251, 238, 209, 0.6)">

    <div class="container">
    
        <div class="row">
        
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            
                <div class="section-title">
                
                    <h2 class="text-center">Available Jobs</h2>
                    
                </div>

            </div>
        
        </div>
        
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                
                @if(isset($jobs) && $jobs->count() > 0)
                    @foreach($jobs as $job)
                    <a href="{{ route('jobs.detail', ['url' => $job->job_url]) }}" class="recent-job-item clearfix">
                        <div class="GridLex-grid-middle">
                            <div class="GridLex-col-6_xs-12">
                                <div class="job-position">
                                    <div class="image">
                                        <img src="{{ asset('images/work.png') }}" alt="image" />
                                    </div>
                                    <div class="content">
                                        <h4>{{ $job->job_title }}</h4>
                                        <p>{{ $job->name_of_organization }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="GridLex-col-3_xs-6_xss-12 mt-10-xss">
                                <div class="job-location">
                                    <i class="fa fa-map-marker text-primary"></i> {{ $job->location }}
                                </div>
                            </div>
                            <div class="GridLex-col-3_xs-6_xss-12">
                                <div class="job-label label label-success">
                                    {{ $job->job_classification }} Role
                                </div>
                                
                            </div>
                        </div>
                    </a>
                    @endforeach
                @endif
                
            </div>
            
        </div>

    </div>

</div>

@include('includes.footer')
		
</div>

</div> 

@include('includes.js_includes')

@stop
