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
                    <div class="col-md-9"><h3>Edit Reference</h3></div>
                </div>

                <div class="job-detail-wrapper">
                    
                    <div class="">
                        <form action="{{ route('profile.update_applicant_reference') }}" method="post">
                            
                            {{ csrf_field() }}

                            <input type="hidden" name="reference_id" value="{{ $reference->reference_id }}">

                            <div class="school_wrap">
                                <table border="0" id="item_table">
                                    <tr>
                                        <td>
                                            <div class="row school_itm">
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name_of_reference">Name of Reference</label>
                                                        <input type="text" name="name_of_reference" class="form-control" 
                                                        value="{{ $reference->name_of_reference }}" placeholder="Name of Reference">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address_of_reference">Address of Reference</label>
                                                        <input type="text" name="address_of_reference" class="form-control" 
                                                        value="{{ $reference->address_of_reference }}" placeholder="Address of Reference">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="email_of_reference">Email of Reference</label>
                                                        <input type="email" name="email_of_reference" class="form-control" 
                                                        value="{{ $reference->email_of_reference }}" placeholder="Email of Reference">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone_of_reference">Phone of Reference</label>
                                                        <input type="text" name="phone_of_reference" class="form-control" 
                                                        value="{{ $reference->phone_of_reference }}" placeholder="Phone of Reference">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="relationship">Relationship</label>
                                                        <input type="text" name="relationship" class="form-control" 
                                                        value="{{ $reference->relationship }}" placeholder="Relationship">
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
