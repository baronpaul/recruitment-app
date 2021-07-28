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
                    <div class="col-md-9"><h3>Additional Information</h3></div>
                </div>

                <div class="job-detail-wrapper">
                    
                    <div class="">
                        <form action="{{ route('job_application.store_additional_info') }}" method="post">
                            
                            {{ csrf_field() }}

                            <input type="hidden" name="job_id" value="{{ $job->job_id }}">
                            
                            <div class="school_wrap">
                                <table border="0" id="item_table">
                                    <tr>
                                        <td>
                                            <div class="row school_itm">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="allow_to_contact_previous">Can we contact your previous Employer</label>
                                                        <select name="allow_to_contact_previous" class="form-control">
                                                            <option value="yes">yes</option>
                                                            <option value="no">no</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="criminal_conviction">Any Criminal Conviction?</label>
                                                        <select name="criminal_conviction" class="form-control">
                                                            <option value="yes">yes</option>
                                                            <option value="no">no</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="details_of_conviction">Details of Conviction</label>
                                                        <textarea name="details_of_conviction" class="form-control" rows="5" 
                                                        placeholder="Details of Conviction"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="availability">Available to start now?</label>
                                                        <select name="availability" class="form-control">
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
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
                                    <button type="submit" class="btn btn-primary mr-2">Save Profile</button> 
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
