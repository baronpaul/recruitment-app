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
            <img src="{{ asset('images/banner3.png') }}" />
        </div>
    
        <div class="banner_txt">
            <h2 class="caps">Hire Top Talent</h2>
            <h3> Faster + Smarter + Easier</h3>
            <div class="banner_txt_btns">
                <a href="" class="btn btn-info">Contact Us</a>
            </div>
        </div>
        
    </div>
</div>

<div class="section sm pb-80" style="">
    <div class="container">
        <div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
            <h2 class="">
                RECRUIT YOUR NEXT SPECIALIZED HIRE
            </h2>
            <p class="light medium_txt">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime optio distinctio exercitationem amet quas dolore ad in debitis. Aut odio, quibusdam ipsum sed nihil nam minima tenetur id ratione debitis?
            </p>
        </div>
    </div>
</div>

<div class="section sm pb-80" style="padding-top: 0px">
    <div class="container">
        

        
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
