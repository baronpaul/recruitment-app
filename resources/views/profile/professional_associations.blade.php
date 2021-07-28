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
                
                <div class="job-detail-wrapper" style="border: 1px #ddd solid; padding: 15px">
                    @if(isset($professional_associations) && $professional_associations->count() > 0)
                        <div class="button-wrap">
                            <a href="{{ route('profile.add_professional_association') }}" class="btn btn-primary">Add Professional Certifications</a>
                        </div>

                        @foreach($professional_associations as $certification)
                        <div class="striped-table" style="background:#f3f3f3; padding: 10px;margin-bottom: 15px">
                            
                            <div class="">
                                <a href="{{ route('profile.edit_professional_association', ['id' => $certification->ps_id ]) }}" class="btn btn-info pull-right">
                                    Edit</a>
                            </div>
                            <table width="100%" border="0">
                                <tr>
                                    <td width="25%">Professional Body</td>
                                    <td width="75%">{{ $certification->professional_body }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Certification</td>
                                    <td width="75%">{{ $certification->qualification }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Date Attained</td>
                                    <td width="75%">{{ $certification->date_attained }}</td>
                                </tr>

                            </table>
                            
                        </div>
                        
                        @endforeach
                    @else
                    
                    <div class="">
                        <p>You have not added any professional certifications</p>
                        <a href="{{ route('profile.add_professional_association') }}" class="btn btn-primary">Add Professional Certification</a>
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
