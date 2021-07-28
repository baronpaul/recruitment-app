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
                
                    <h2 class="">Profile</h2>
                    
                </div>

            </div>
        
        </div>
        @if(Session::has('success'))
        <div class=row>
            <div class="col-md-12">
                <div class="alert alert-info text-center">
                    <span>{{ Session::get('success') }}</span>
                </div>
            </div>
        </div>
        @endif

        @if($user->completed_profile == 'no')
        <div class=row>
            <div class="col-md-12">
                <div class="alert alert-info text-center">
                    <span>You have not completed the setup of your profile. 
                        <a href="{{ route('profile.education') }}" class="btn-link">Please complete your profile.</a></span>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-3">
                <div class="profile_info">
                    @php
                        if($user->profile_pic == null) {
                            $profile_pic = '';
                        }
                        else {
                            $profile_pic = '<img src="'; 
                            $profile_pic .= asset($user->profile_pic).'" />';
                        }
                    @endphp
                    
                    <div class="profile_img_wrap">
                        <div class="profile_img">
                            {!! $profile_pic !!}
                        </div>
                        
                        <div class="skin">
                            <a href="{{ route('profile.edit_profile_pic') }}" class="btn btn-info btn-block">Update Image</a>
                        </div>
                    </div>

                    <a href="{{ route('profile.upload_resume') }}" class="btn btn-primary btn-block">Upload Resume</a>
                </div>
            </div>
            <div class="col-md-6" style="border: 1px #ddd solid; padding: 15px">
                <div class="job-detail-wrapper">
                    <div class="button-wrap text-right">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div>

                    <div class="striped-table" style="background:#f3f3f3; padding: 10px;margin-bottom: 15px">
                        <table width="100%" border="0">
                            <tr>
                                <td width="30%">First Name</td>
                                <td width="70%">{{ $user->firstname }}</td>
                            </tr>

                            <tr>
                                <td width="">Middle Name</td>
                                <td width="">{{ $user->middlename }}</td>
                            </tr>

                            <tr>
                                <td width="">Last Name</td>
                                <td width="">{{ $user->lastname }}</td>
                            </tr>

                            <tr>
                                <td width="">Email</td>
                                <td width="">{{ $user->email }}</td>
                            </tr>

                            <tr>
                                <td width="">Date of Birth</td>
                                <td width="">{{ $user->date_of_birth }}</td>
                            </tr>

                            <tr>
                                <td width="">Sex</td>
                                <td width="">{{ $user->sex }}</td>
                            </tr>

                            <tr>
                                <td width="">Marital Status</td>
                                <td width="">{{ $user->marital_status }}</td>
                            </tr>

                            <tr>
                                <td width="">Nationality</td>
                                <td width="">{{ $user->nationality }}</td>
                            </tr>

                            <tr>
                                <td width="">Permanent Address</td>
                                <td width="">{{ $user->permanent_address }}</td>
                            </tr>

                            <tr>
                                <td width="">Current Address</td>
                                <td width="">{{ $user->current_address }}</td>
                            </tr>

                            <tr>
                                <td width="">Telephone</td>
                                <td width="">{{ $user->telephone }}</td>
                            </tr>
                        </table>
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
