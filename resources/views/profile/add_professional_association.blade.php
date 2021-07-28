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
                
                    <h2 class="">Professional Certifications</h2>
                    
                </div>

            </div>
        
        </div>
        
        

        <div class="row">

            <div class="col-md-9">
                
                <div class="row">
                    <div class="col-md-8"><h3>Professional Certifications</h3></div>
        
                    <div class="col-md-4 text-right"><button type="button" class="btn btn-info add-extra-profession">Add Professional Certification</button></div>
                </div>

                <div class="job-detail-wrapper">
                    
                    <div class="">
                        <form action="{{ route('profile.store_professional_association') }}" method="post">
                            
                            {{ csrf_field() }}

                            <div class="school_wrap">
                                <table border="0" id="item_table">
                                    <tr>
                                        <td>
                                            <div class="row school_itm">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="professional_body">Professional Body</label>
                                                        <input type="text" name="professional_body[]" class="form-control" 
                                                        placeholder="Professional Body">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="qualification">Qualification Earned</label>
                                                        <input type="text" name="qualification[]" class="form-control" 
                                                        placeholder="Qualification Earned">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="date_attained">Date Attained</label>
                                                        <input type="date" name="date_attained[]" class="form-control" >
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


    
$(document).on('click', '.add-extra-profession', function(){
    var html = '';
    html += '<tr><td><div class="row school_itm">';
    html += '<div class="col-md-12 school_itm_top"><button type="button" class="btn btn-danger btn-sm remove-itm pull-right">Remove</button></div>';
    html += '<div class="col-md-12"><div class="form-group"><label for="professional_body">Professional Body</label><input type="text" name="professional_body[]" class="form-control" placeholder="Professional Body"></div></div>';
    html += '<div class="col-md-6"><div class="form-group"><label for="qualification">Qualification Earned</label><input type="text" name="qualification[]" class="form-control" placeholder="Qualification Earned"></div></div>';
    html += '<div class="col-md-6"><div class="form-group"><label for="date_attained">Date Attained</label><input type="date" name="date_attained[]" class="form-control" ></div></div>';
    html += '</div></td></tr>';
    $('#item_table').append(html);
});
    

</script>


@stop
