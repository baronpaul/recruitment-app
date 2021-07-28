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
                
                    <h2 class="">My Profile</h2>
                    
                </div>

            </div>
        
        </div>
        
        

        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-9"><h3>Technical Skills</h3></div>
        
                    <div class="col-md-3 text-right"><button type="button" class="btn btn-info add-extra-skill">Add Skill</button></div>
                </div>

                <div class="job-detail-wrapper">
                    
                    <div class="">
                        <form action="{{ route('job_application.store_computer_skills') }}" method="post">
                            
                            {{ csrf_field() }}

                            <input type="hidden" name="job_id" value="{{ $job->job_id }}">
                            
                            <div class="school_wrap">
                                <table border="0" id="item_table">
                                    <tr>
                                        <td>
                                            <div class="row school_itm">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="skill">Skill</label>
                                                        <input type="text" name="skill[]" class="form-control" 
                                                        placeholder="Skill">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="level">Level</label>
                                                        <select class="form-control" name="level[]">
                                                            <option></option>
                                                            <option value="1">Learner</option>
                                                            <option value="2">Basic</option>
                                                            <option value="3">Intermediate</option>
                                                            <option value="4">Advanced</option>
                                                            <option value="5">Adept</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
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


@include('includes.footer')
		
</div>

</div> 

@include('includes.js_includes')

@stop
