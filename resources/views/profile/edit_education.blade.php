@php
    $website_title = 'Lines and Pegs :: Home page';
    $description = 'Lines & Pegs website';
    $meta_tags = '';

    $select_certificate = '';
    $select_certificate .= '<select name="certificate_received" class="form-control select_certificate" required>';

    foreach($educational_certificates as $certificate) {  
        $select_certificate .= '<option value="' .$certificate->certificate_rating.'" ';
            if($education->certificate_received == $certificate->certificate_rating) {
                $select_certificate .= ' selected';
            }
        $select_certificate .= '>'. $certificate->certificate_title.'</option>';
    }

    $select_certificate .= '</select>';
@endphp

@extends('layouts.mainlayout')

@section('content')

<div class="section sm pb-80" style="min-height:100vh">

    <div class="container">
    
        <div class="row">
        
            <div class="col-sm-12 col-md-12">
            
                <div class="section-title">
                
                    <h2 class="">Education</h2>
                    
                </div>

            </div>
        
        </div>
        
        

        <div class="row">

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-9"><h3>Edit Educational Information</h3></div>
                </div>
                <div class="job-detail-wrapper">
                    
                    <div class="">
                        <form action="{{ route('profile.update_education') }}" method="post">
                            
                            {{ csrf_field() }}

                            <input type="hidden" name="education_id" value="{{ $education->education_id }}">

                            <div class="school_wrap">
                                <table border="0" id="item_table" width="100%">
                                    <tr>
                                        <td>
                                            <div class="row school_itm">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="type_of_instutions">Type of Institution</label>
                                                        <select name="type_of_institution" class="form-control">
                                                            <option value="secondary" <?php if($education->type_of_institution == 'secondary') echo 'selected' ?>>secondary</option>
                                                            <option value="graduate" <?php if($education->type_of_institution == 'graduate') echo 'selected' ?>>graduate</option>
                                                            <option value="post graduate" <?php if($education->type_of_institution == 'post graduate') echo 'selected' ?>>post graduate</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name_of_institution">Name of Institution</label>
                                                        <input type="text" name="name_of_institution" class="form-control" 
                                                        value="{{ $education->name_of_institution }}" 
                                                        placeholder="Name of Institution">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address_of_institution">Address of Institution</label>
                                                        <input type="text" name="address_of_institution" class="form-control" 
                                                        value="{{ $education->address_of_institution }}" 
                                                        placeholder="Address of Institution">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <input type="text" name="city" class="form-control" 
                                                        value="{{ $education->city }}" 
                                                        placeholder="City">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="country">Country</label>
                                                        <input type="text" name="country" class="form-control" 
                                                        value="{{ $education->country }}" 
                                                        placeholder="Country">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="certificate_received">Certificate Received</label>
                                                        {!! $select_certificate !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field_of_study">Field of Study</label>
                                                        <input type="text" name="field_of_study" class="form-control" 
                                                        value="{{ $education->field_of_study }}" 
                                                        placeholder="Field of Study">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="start_date">Start Date</label>
                                                        <input type="date" name="start_date" class="form-control" 
                                                        value="{{ $education->start_date }}" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="end_date">End Date</label>
                                                        <input type="date" name="end_date" class="form-control" 
                                                        value="{{ $education->end_date }}" >
                                                    </div>
                                                </div>
                                            </div>
                                        <td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mr-3">Update Education</button>
                                    <a href="{{ route('profile.education') }}" class="btn btn-info">Back to Education</a>
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
