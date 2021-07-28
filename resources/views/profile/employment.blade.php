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
                
                    <h2 class="">Employment History</h2>
                    
                </div>

            </div>
        
        </div>
        
        

        <div class="row">

            <div class="col-md-9">
                
                <div class="job-detail-wrapper" style="border: 1px #ddd solid; padding: 15px">
                    @if(isset($employments) && $employments->count() > 0)
                        <div class="button-wrap">
                            <a href="{{ route('profile.add_employment') }}" class="btn btn-primary">Add Employment Record</a>
                        </div>
                        
                        @foreach($employments as $employment)
                        <div class="striped-table" style="background:#f3f3f3; padding: 10px;margin-bottom: 15px">
                            
                            
                            <div class="">
                                <a href="{{ route('profile.edit_employment', ['id' => $employment->employment_id ]) }}" class="btn btn-info pull-right">
                                    Edit Employment Record
                                </a>
                            </div>
                            <table width="100%" border="0">
                                <tr>
                                    <td width="25%">Name of Employer</td>
                                    <td width="75%">{{ $employment->name_of_employer }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Address of Employer</td>
                                    <td width="75%">{{ $employment->address_of_employer }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Industry</td>
                                    <td width="75%">{{ $employment->industry }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Employment Start</td>
                                    <td width="75%">{{ $employment->employment_start }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Employment End</td>
                                    <td width="75%">{{ $employment->employment_end }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Position Held</td>
                                    <td width="75%">{{ $employment->position_held }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Category of Emplyees Supervised</td>
                                    <td width="75%">{{ $employment->category_of_employees_supervised }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Reason for Leaving</td>
                                    <td width="75%">{{ $employment->reason_for_leaving }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Name of Supervisor</td>
                                    <td width="75%">{{ $employment->name_of_supervisor }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Title of Supervisor</td>
                                    <td width="75%">{{ $employment->title_of_supervisor }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Starting Salary</td>
                                    <td width="75%">{{ $employment->starting_salary }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Salary at Exit</td>
                                    <td width="75%">{{ $employment->salary_at_exit }}</td>
                                </tr>

                                <tr>
                                    <td width="25%">Description of Duties</td>
                                    <td width="75%">{{ $employment->description_of_duties }}</td>
                                </tr>
                            </table>
                            
                        </div>
                        @endforeach

                    @else
                    
                    <div class="">
                        <p>You have not added your employment history</p>
                        <a href="{{ route('profile.add_employment') }}" class="btn btn-primary">Add Employment History</a>
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
