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
                
                <div class="job-detail-wrapper" style="border: 1px #ddd solid; padding: 15px">
                    @if(isset($applicant_references) && $applicant_references->count() > 0)
                        <div class="button-wrap">
                            <a href="{{ route('profile.add_applicant_references') }}" class="btn btn-primary">Add Applicant Reference</a>
                        </div>
                        
                        @foreach($applicant_references as $reference)
                        <div class="striped-table" style="background:#f3f3f3; padding: 10px;margin-bottom: 15px">
                            <div class="">
                                <a href="{{ route('profile.edit_applicant_reference', ['id' => $reference->reference_id ]) }}" 
                                    class="btn btn-info pull-right">
                                    Edit
                                </a>
                            </div>

                            <table width="100%" border="0">
                                <tr>
                                    <td width="25%">Name of Reference</td>
                                    <td width="75%">{{ $reference->name_of_reference }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Email of Reference</td>
                                    <td width="75%">{{ $reference->email_of_reference }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Phone</td>
                                    <td width="75%">{{ $reference->phone_of_reference }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Address of Reference</td>
                                    <td width="75%">{{ $reference->address_of_reference }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Relationship</td>
                                    <td width="75%">{{ $reference->relationship }}</td>
                                </tr>

                            </table>
                            
                        </div>
                        @endforeach

                    @else
                    
                    <div class="">
                        <p>You have not added any references</p>
                        <a href="{{ route('profile.add_applicant_references') }}" class="btn btn-primary">Add References</a>
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
