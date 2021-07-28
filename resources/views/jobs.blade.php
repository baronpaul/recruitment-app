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
        
            <div class="col-md-12 col-sm-12">
            
                <div class="section-title">
                
                    <h2 class="">Available Jobs</h2>
                    
                </div>

            </div>
        
        </div>
        
        <div class="row">

            <div class="col-md-10 col-sm-12 col-xs-12">
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
