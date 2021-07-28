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
        
            <div class="col-sm-12 col-md-12">
            
                <div class="section-title">
                
                    <h2 class="">Position: {{ $job->job_title }}</h2>
                    
                </div>

            </div>
        
        </div>
        
        

        <div class="row">
            <div class="col-md-9" style="border: 1px #ddd solid; padding: 15px">
                
                <div class="job-detail-wrapper">
                    <h3>Application Completed</h3>
                    <div class="">
                        <p>Congratulations, you have successfully submitted your job application.</p>
                        <br>
                        <a href="{{ route('profile') }}" class="btn btn-info">View Your Profilee</a>
                    </div>
                    
                </div>
            </div>

            <div class="col-md-3">
                @include('includes.application_sidebar')
            </div>
            
        </div>

    </div>

</div>

@include('includes.footer')
		
</div>

</div> 

@include('includes.js_includes')

@stop
