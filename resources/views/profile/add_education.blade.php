@php
    $website_title = 'Lines and Pegs :: Home page';
    $description = 'Lines & Pegs website';
    $meta_tags = '';

    $select_certificate = '';
    $select_certificate .= '<select name="certificate_received[]" class="form-control select_certificate" required>';

    foreach($educational_certificates as $certificate) {  
        $select_certificate .= '<option value="' .$certificate->certificate_rating.'">'. $certificate->certificate_title.'</option>';
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
                    <div class="col-md-9"><h3>Educational Information</h3></div>
        
                    <div class="col-md-3"><a href="#" class="btn btn-info add-extra-school">Add Institution</a></div>
                </div>
                <div class="job-detail-wrapper">
                    
                    <div class="">
                        <form action="{{ route('profile.store_education') }}" method="post">
                            
                            {{ csrf_field() }}

                            <div class="school_wrap">
                                <table border="0" id="item_table" width="100%">
                                    <tr>
                                        <td>
                                            <div class="row school_itm">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="type_of_instutions">Type of Institution</label>
                                                        <select name="type_of_institution[]" class="form-control">
                                                            <option value="secondary">secondary</option>
                                                            <option value="graduate">graduate</option>
                                                            <option value="post graduate">post graduate</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name_of_institution">Name of Institution</label>
                                                        <input type="text" name="name_of_institution[]" class="form-control" 
                                                        value="{{ old('name_of_institution') }}" 
                                                        placeholder="Name of Institution">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address_of_institution">Address of Institution</label>
                                                        <input type="text" name="address_of_institution[]" class="form-control" 
                                                        value="{{ old('address_of_institution') }}" 
                                                        placeholder="Address of Institution">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <input type="text" name="city[]" class="form-control" 
                                                        value="{{ old('city') }}" 
                                                        placeholder="City">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="country">Country</label>
                                                        <input type="text" name="country[]" class="form-control" 
                                                        value="{{ old('country') }}" 
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
                                                        <input type="text" name="field_of_study[]" class="form-control" 
                                                        value="{{ old('field_of_study') }}" 
                                                        placeholder="Field of Study">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="start_date">Start Date</label>
                                                        <input type="date" name="start_date[]" class="form-control" 
                                                        value="{{ old('start_date') }}" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="end_date">End Date</label>
                                                        <input type="date" name="end_date[]" class="form-control" 
                                                        value="{{ old('end_date') }}" >
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


<script>
    $(document).on('click', '.add-extra-school', function(){
          console.log('button was clicked');
          var html = '';
          html += '<tr><td><div class="row school_itm">';
          html += '<div class="col-md-12 school_itm_top"><button type="button" class="btn btn-danger btn-sm remove-itm pull-right">Remove</button></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="type_of_institution">Type of Institution</label><select name="type_of_institution[]" class="form-control"><option value="secondary">secondary</option><option value="graduate">graduate</option><option value="post graduate">post graduate</option></select></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="name_of_institution">Name of Institution</label><input type="text" name="name_of_institution[]" class="form-control" placeholder="Name of Institution"></div></div>';
          html += '<div class="col-md-12"><div class="form-group"><label for="address_of_institution">Address of Institution</label><input type="text" name="address_of_institution[]" class="form-control" placeholder="Address of Institution"></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="city">City</label><input type="text" name="city[]" class="form-control" 	placeholder="City"></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="country">Country</label><input type="text" name="country[]" class="form-control"  	placeholder="Country"></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="certificate_received">Certificate Received</label><?php echo $select_certificate ?></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="field_of_study">Field of Study</label><input type="text" name="field_of_study[]" class="form-control" placeholder="Field of Study"></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="start_date">Start Date</label><input type="date" name="start_date[]" class="form-control"></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="end_date">End Date</label><input type="date" name="end_date[]" class="form-control" ></div></div>';
          html += '</div></td></tr>';
          $('#item_table').append(html);
    });
</script>


@stop
