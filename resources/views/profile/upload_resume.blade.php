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
                
                    <h2 class="">Edit Profile</h2>
                    
                </div>

            </div>
        
        </div>
        
        

        <div class="row">
            <div class="col-md-9">
                
                <div class="job-detail-wrapper" style="border: 1px #ddd solid; padding: 15px">
                    
                    <div class="">
                        <form action="{{ route('profile.update_profile_pic') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="resume">Select Resume</label>
                                        <input type="file" name="resume" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mr-2">Upload Resume</button>
                                </div>

                            </div>

                        </form>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-md-3">
                @include('includes.profile_sidebar');
            </div>
        </div>

    </div>

</div>

@include('includes.footer')
		
</div>

</div> 

@include('includes.js_includes')

@stop
