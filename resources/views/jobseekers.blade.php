@php
    $website_title = '';
    $description = '';
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
            <h2 class="caps">Smart Recruitment<br> For Job Seekers</h2>
            <div class="banner_txt_btns">
                <a href="{{ route('register') }}" class="btn btn-info">Get Started</a>
            </div>
        </div>
        
    </div>
</div>

<div class="section sm pb-80" style="">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
                <h3>Get Started in 3 Easy Steps</h3>
                
                <div class="steps_wrap">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="box">
                                <div class="box_ins">
                                    <h3>Sign up</h3>
                                    <p>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima tenetur, magnam, commodi autem alias doloribus saepe excepturi eum rem atque voluptatem quas labore odit officia est consequatur, aliquid distinctio ea.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="box">
                                <div class="box_ins">
                                    <h3>Update Profile</h3>
                                    <p>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima tenetur, magnam, commodi autem alias doloribus saepe excepturi eum rem atque voluptatem quas labore odit officia est consequatur, aliquid distinctio ea.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="box">
                                <div class="box_ins">
                                    <h3>Apply for a Job</h3>
                                    <p>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima tenetur, magnam, commodi autem alias doloribus saepe excepturi eum rem atque voluptatem quas labore odit officia est consequatur, aliquid distinctio ea.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <a href="{{ route('register') }}" class="btn btn-info">Sign up</a>
                        </div>

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
