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
                
                    <h2 class="">Additional Info</h2>
                    
                </div>

            </div>
        
        </div>
        
        

        <div class="row">
            <div class="col-md-9" style="border: 1px #ddd solid; padding: 15px">
    
                <div class="job-detail-wrapper">

                    @if(isset($additional_info) && $additional_info != null )

                    <div class="button-wrap">
                        <a href="{{ route('profile.edit_additional_info', ['id' => $additional_info->additional_info_id]) }}" class="btn btn-primary">Edit Additional Info</a>
                    </div>
                    <div class="striped-table" style="background:#f3f3f3; padding: 10px;margin-bottom: 15px">
                        <table width="100%" border="0">
                            
                            <tr>
                                <td>Are You available</td>
                                <td>{{ $additional_info->availability }}</td>
                            </tr>
                            
                            <tr>
                                <td width="30%">Permit to Contact Prev Employer</td>
                                <td width="70%">{{ $additional_info->allow_to_contact_previous }}</td>
                            </tr>

                            <tr>
                                <td>Any Criminal Convictions</td>
                                <td>{{ $additional_info->criminal_conviction }}</td>
                            </tr>

                            <tr>
                                <td>Details of Conviction</td>
                                <td>{{ $additional_info->details_of_conviction }}</td>
                            </tr>


                        </table>
                    </div>
                    @else
                    <div class="">
                        <p>You have not added additional information</p>
                        <a href="{{ route('profile.add_additional_info') }}" class="btn btn-primary">Add Additional Info</a>
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
