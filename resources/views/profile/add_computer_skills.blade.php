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
                        <form action="{{ route('profile.store_computer_skills') }}" method="post">
                            
                            {{ csrf_field() }}

                            <div class="school_wrap">
                                <table border="0" id="item_table">
                                    <tr>
                                        <td>
                                            <div class="row school_itm">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="skill">Skill</label>
                                                        <input type="text" name="skill[]" class="form-control" 
                                                        placeholder="Skill">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="level">Level</label>
                                                        <select class="form-control" name="level[]">
                                                            <option></option>
                                                            <option value="learner">Learner</option>
                                                            <option value="basic">Basic</option>
                                                            <option value="intermediate">Intermediate</option>
                                                            <option value="advanced">Advanced</option>
                                                            <option value="adept">Adept</option>
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

<script>

$(document).on('click', '.add-extra-skill', function(){
    var html = '';
    html += '<tr><td><div class="row school_itm">';
    html += '<div class="col-md-12 school_itm_top"><button type="button" class="btn btn-danger btn-sm remove-itm pull-right">Remove</button></div>';
    html += '<div class="col-md-6"><div class="form-group"><label for="skill">Skill</label><input type="text" name="skill[]" class="form-control" 		placeholder="Skill"></div></div>';
    html += '<div class="col-md-6"><div class="form-group"><label for="level">Level</label><select class="form-control" name="level[]"><option></option><option value="learner">Learner</option><option value="basic">Basic</option><option value="intermediate">Intermediate</option><option value="advanced">Advanced</option><option value="adept">Adept</option></select></div></div>';
    html += '</div></td></tr>';
    $('#item_table').append(html);
});
    
</script>


@stop
