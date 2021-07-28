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
                
                    <h2 class="">Edit Profile</h2>
                    
                </div>

            </div>
        
        </div>
        
        

        <div class="row">
            <div class="col-md-9">
                
                <div class="job-detail-wrapper" style="border: 1px #ddd solid; padding: 15px">
                    
                    <div class="">
                        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="firstname" class="form-control" 
                                        value="{{ $user->firstname }}" 
                                        placeholder="First Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="middlename">Middle Name</label>
                                        <input type="text" name="middlename" class="form-control" 
                                        value="{{ $user->middlename }}" 
                                        placeholder="Middle Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" name="lastname" class="form-control" 
                                        value="{{ $user->lastname }}" 
                                        placeholder="Last Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control" 
                                        value="{{ $user->email }}" 
                                        placeholder="Email">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sex">Sex</label>
                                        <select name="sex" class="form-control">
                                            <option value="male" <?php if($user->sex == 'male') echo 'selected' ?>>Male</option>
                                            <option value="female" <?php if($user->sex == 'female') echo 'selected' ?>>Female</option>
                                        </select>
                                    </div>
                                </div>

                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_of_birth">Date of Birth</label>
                                        <input type="date" name="date_of_birth" class="form-control" 
                                        value="{{ $user->date_of_birth }}">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marital_status">Marital Status</label>
                                        <select name="marital_status" class="form-control">
                                            <option value="single" <?php if($user->marital_status == 'single') echo 'selected' ?>>Single</option>
                                            <option value="married" <?php if($user->marital_status == 'married') echo 'selected' ?>>Married</option>
                                            <option value="seperated" <?php if($user->marital_status == 'seperated') echo 'selected' ?>>Separated</option>
                                            <option value="divorced" <?php if($user->marital_status == 'divorced') echo 'selected' ?>>Divorced</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone">Telephone</label>
                                        <input type="text" name="telephone" class="form-control" 
                                        value="{{ $user->telephone }}" 
                                        placeholder="Telephone">
                                    </div>
                                </div>

                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="permanent_address">Permanent Address</label>
                                        <input type="text" name="permanent_address" class="form-control" 
                                        value="{{ $user->permanent_address }}" 
                                        placeholder="Permanent Address">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="current_address">Current Address</label>
                                        <input type="text" name="current_address" class="form-control" 
                                        value="{{ $user->current_address }}" 
                                        placeholder="Current Address">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nationality">Nationality</label>
                                        <input type="text" name="nationality" class="form-control" 
                                        value="{{ $user->nationality }}" 
                                        placeholder="Nationality">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profile_pic">Profile Picture</label>
                                        <input type="file" name="profile_pic" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary mr-2">Edit Profile</button>
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
