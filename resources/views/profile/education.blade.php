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
                
                    <h2 class="">Education</h2>
                    
                </div>

            </div>
        
        </div>
        
        

        <div class="row">

            <div class="col-md-9">
                
                <div class="job-detail-wrapper" style="border: 1px #ddd solid; padding: 15px">
                    @if(isset($educations) && $educations->count() > 0)
                        <div class="button-wrap">    
                            <a href="{{ route('profile.add_education') }}" class="btn btn-primary">Add Education</a>
                        </div>
                        
                        @foreach($educations as $education)
                        <div class="striped-table" style="background:#f3f3f3; padding: 10px;margin-bottom: 15px">
                            
                            <div class="">
                                <a href="{{ route('profile.edit_education', ['id' => $education->education_id ]) }}" class="btn btn-info pull-right">
                                    Edit Education</a>
                            </div>
                            <table width="100%" border="0">
                                <tr>
                                    <td width="25%">Type of Institution</td>
                                    <td width="75%">{{ $education->type_of_institution }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Name of Institution</td>
                                    <td width="75%">{{ $education->name_of_institution }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Address of Institution</td>
                                    <td width="75%">{{ $education->address_of_institution }}</td>
                                </tr>
                                
                                <tr>
                                    <td width="25%">City</td>
                                    <td width="75%">{{ $education->city }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Country</td>
                                    <td width="75%">{{ $education->country }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Start</td>
                                    <td width="75%">{{ $education->start_date }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Completion</td>
                                    <td width="75%">{{ $education->end_date }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Certificate Received</td>
                                    <td width="75%">{{ $education->certificate_abbrev }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Field of Study</td>
                                    <td width="75%">{{ $education->field_of_study }}</td>
                                </tr>

                            </table>
                            
                        </div>
                        @endforeach

                    @else
                    
                    <div class="">
                        <p>You have not added your academic history</p>
                        <a href="{{ route('profile.add_education') }}" class="btn btn-primary">Add Education</a>
                    </div>
                    
                    @endif
                    
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
