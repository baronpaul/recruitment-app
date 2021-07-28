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
                
                    <h2 class="">Technical Skills</h2>
                    
                </div>

            </div>
        
        </div>
        
        

        <div class="row">

            <div class="col-md-9">
                
                <div class="row">
                    <div class="col-md-9"><h3>Technical Skills</h3></div>
        
                    <div class="col-md-3 text-right"><button type="button" class="btn btn-info add-extra-skill">Add Skill</button></div>
                </div>

                <div class="job-detail-wrapper">
                    
                    <div class="">
                        <form action="{{ route('profile.update_computer_skill') }}" method="post">
                            
                            {{ csrf_field() }}

                            <input type="hidden" name="skill_id" value="{{ $computer_skill->skill_id }}">

                            <div class="school_wrap">
                                <table border="0" id="item_table">
                                    <tr>
                                        <td>
                                            <div class="row school_itm">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="skill">Skill</label>
                                                        <input type="text" name="skill" class="form-control" value="{{ $computer_skill->skill }}"
                                                        placeholder="Skill">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="level">Level</label>
                                                        <select class="form-control" name="level">
                                                            <option></option>
                                                            <option value="learner" <?php if($computer_skill->level == 'leaner') echo 'selected' ?>>Learner</option>
                                                            <option value="basic" <?php if($computer_skill->level == 'basic') echo 'selected' ?>>Basic</option>
                                                            <option value="intermediate" <?php if($computer_skill->level == 'intermediate') echo 'selected' ?>>Intermediate</option>
                                                            <option value="advanced" <?php if($computer_skill->level == 'advanced') echo 'selected' ?>>Advanced</option>
                                                            <option value="adept" <?php if($computer_skill->level == 'adept') echo 'selected' ?>>Adept</option>
                                                        </select>
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
