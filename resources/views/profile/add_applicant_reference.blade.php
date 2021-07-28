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
                
                    <h2 class="">References</h2>
                    
                </div>

            </div>
        
        </div>
        
        

        <div class="row">

            <div class="col-md-9">
                
                <div class="row">
                    <div class="col-md-9"><h3>References</h3></div>
        
                    <div class="col-md-3"><button type="button" class="btn btn-info add-extra-reference">Add Reference</button></div>
                </div>

                <div class="job-detail-wrapper">
                    
                    <div class="">
                        <form action="{{ route('profile.store_applicant_reference') }}" method="post">
                            
                            {{ csrf_field() }}

                            <div class="school_wrap">
                                <table border="0" id="item_table">
                                    <tr>
                                        <td>
                                            <div class="row school_itm">
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name_of_reference">Name of Reference</label>
                                                        <input type="text" name="name_of_reference[]" class="form-control" 
                                                        value="{{ old('name_of_reference') }}" 
                                                        placeholder="Name of Reference">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address_of_reference">Address of Reference</label>
                                                        <input type="text" name="address_of_reference[]" class="form-control" 
                                                        placeholder="Address of Reference">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="email_of_reference">Email of Reference</label>
                                                        <input type="email" name="email_of_reference[]" class="form-control" 
                                                        placeholder="Email of Reference">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone_of_reference">Phone of Reference</label>
                                                        <input type="text" name="phone_of_reference[]" class="form-control" 
                                                        placeholder="Phone of Reference">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="relationship">Relationship</label>
                                                        <input type="text" name="relationship[]" class="form-control" 
                                                        placeholder="Relationship">
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
    
    $(document).on('click', '.add-extra-reference', function(){
          var html = '';
          html += '<tr><td><div class="row school_itm">';
          html += '<div class="col-md-12 school_itm_top"><button type="button" class="btn btn-danger btn-sm remove-itm pull-right">Remove</button></div>';
          html += '<div class="col-md-12"><div class="form-group"><label for="name_of_reference">Name of Reference</label><input type="text" name="name_of_reference[]" class="form-control" placeholder="Name of Reference"></div></div>';
          html += '<div class="col-md-12"><div class="form-group"><label for="address_of_reference">Address of Reference</label><input type="text" name="address_of_reference[]" class="form-control" placeholder="Address of Reference"></div></div>';
          html += '<div class="col-md-12"><div class="form-group"><label for="email_of_reference">Email of Reference</label><input type="email" name="email_of_reference[]" class="form-control" placeholder="Email of Reference"></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="phone_of_reference">Phone of Reference</label><input type="text" name="phone_of_reference[]" class="form-control" placeholder="Phone of Reference"></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="relationship">Relationship</label><input type="text" name="relationship[]" class="form-control" placeholder="Relationship"></div></div>';
          html += '</div></td></tr>';
          $('#item_table').append(html);
    });

</script>

@stop
