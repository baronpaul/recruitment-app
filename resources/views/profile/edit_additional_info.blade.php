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
                
                    <h2 class="">Edit Additional Info</h2>
                    
                </div>

            </div>
        
        </div>
        
        

        <div class="row">
            <div class="col-md-9">
    
                <div class="job-detail-wrapper">
                    
                    <div class="">
                        <form action="{{ route('profile.update_additional_info') }}" method="post">
                            
                            {{ csrf_field() }}

                            <input type="hidden" name="additional_info_id" value="{{ $additional_info->additional_info_id }}">

                            <div class="school_wrap">
                                <table border="0" id="item_table" width="100%">
                                    <tr>
                                        <td>
                                            <div class="row school_itm">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="allow_to_contact_previous">Permit us to Contact Prevous Employer</label>
                                                        <select name="allow_to_contact_previous" class="form-control">
                                                            <option></option>
                                                            <option value="yes" <?php if($additional_info->allow_to_contact_previous == 'yes') echo 'selected' ?>>yes</option>
                                                            <option value="no" <?php if($additional_info->allow_to_contact_previous == 'no') echo 'selected' ?>>no</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="criminal_conviction">Have you had any criminal convictions</label>
                                                        <select name="criminal_conviction" class="form-control">
                                                            <option value="yes" <?php if($additional_info->criminal_conviction == 'yes') echo 'selected' ?>>yes</option>
                                                            <option value="no"  <?php if($additional_info->criminal_conviction == 'no') echo 'selected' ?>>no</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="details_of_conviction">Details of Conviction</label>
                                                        <textarea name="details_of_conviction" class="form-control" rows="5" 
                                                        placeholder="Details of Conviction">{{ $additional_info->details_of_conviction }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="availability">Are you available</label>
                                                        <select name="availability" class="form-control">
                                                            <option value="yes" <?php if($additional_info->availability == 'yes') echo 'selected' ?>>yes</option>
                                                            <option value="no" <?php if($additional_info->availability == 'no') echo 'selected' ?>>no</option>
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
