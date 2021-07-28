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

            <div class="col-md-9">
                <div class="job-detail-wrapper">
                    
                    <div class="">
                        <form action="{{ route('job_application.update') }}" method="post">
                            {{ csrf_field() }}

                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="job_id" value="{{ $job->job_id }}">
                            
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="firstname" class="form-control" 
                                        value="{{ $user->firstname }}" 
                                        placeholder="First Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">Middle Name</label>
                                        <input type="text" name="firstname" class="form-control" 
                                        value="{{ $user->firstname }}" 
                                        placeholder="Middle Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">Last Name</label>
                                        <input type="text" name="firstname" class="form-control" 
                                        value="{{ $user->firstname }}" 
                                        placeholder="Last Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control" 
                                        value="{{ $user->email }}" 
                                        placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sex">Sex</label>
                                        <input type="text" name="sex" class="form-control" 
                                        value="{{ $user->sex }}" 
                                        placeholder="Sex">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marital_status">Marital Status</label>
                                        <input type="text" name="marital_status" class="form-control" 
                                        value="{{ $user->marital_status }}" 
                                        placeholder="Marital Status">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_of_birth">Date of Birth</label>
                                        <input type="date" name="date_of_birth" class="form-control" 
                                        value="{{ $user->date_of_birth }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="permanent_address">Permanent Address</label>
                                        <input type="text" name="permanent_address" class="form-control" 
                                        value="{{ $user->permanent_address }}" 
                                        placeholder="Permanent Address">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="current_aaddress">Current Address</label>
                                        <input type="text" name="current_aaddress" class="form-control" 
                                        value="{{ $user->current_aaddress }}" 
                                        placeholder="Current Address">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone">Telephone</label>
                                        <input type="text" name="telephone" class="form-control" 
                                        value="{{ $user->telephone }}" 
                                        placeholder="Telephone">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nationality">Nationality</label>
                                        <input type="text" name="nationality" class="form-control" 
                                        value="{{ $user->nationality }}" 
                                        placeholder="Nationality">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mr-2">Save and Continue</button>
                                </div>

                            </div>

                        </form>
                    </div>
                    
                </div>
            </div>

            <div class="col-md-3">
                @include('includes.application_sidebar')
            </div>
            
        </div>

    </div>

</div>

@stop
