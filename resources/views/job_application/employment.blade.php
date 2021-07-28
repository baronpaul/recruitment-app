@php
    $website_title = 'Excel RecruitPro :: Home page';
    $description = 'Excel RecruitPro website';
    $meta_tags = '';

    $select_industry = '';
    $select_industry .= '<select name="industry[]" class="form-control select_industry" required>';

    foreach($industries as $industry) {  
        $select_industry .= '<option value="' .$industry->title.'">'. $industry->title.'</option>';
    }

    $select_industry .= '</select>';
@endphp

@extends('layouts.mainlayout')

@section('content')

<div class="section sm pb-80" style="min-height:100vh">

    <div class="container">
    
        <div class="row">
        
            <div class="col-sm-12 col-md-12">
            
                <div class="section-title">
                
                    <h2 class="">My Profile</h2>
                    
                </div>

            </div>
        
        </div>
        
        

        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-8"><h3>Employment History</h3></div>
        
                    <div class="col-md-4 text-right"><button type="button" class="btn btn-info add-extra-employment">Add Employment Record</button></div>
                </div>

                <div class="job-detail-wrapper">
                    
                    <div class="">
                        <form action="{{ route('job_application.store_employment') }}" method="post">
                            
                            {{ csrf_field() }}

                            <input type="hidden" name="job_id" value="{{ $job->job_id }}">
                            
                            <div class="school_wrap">
                                <table border="0" id="item_table">
                                    <tr>
                                        <td>
                                            <div class="row school_itm">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name_of_employer">Name of Employer</label>
                                                        <input type="text" name="name_of_employer[]" class="form-control" 
                                                        placeholder="Name of Employer">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address_of_employer">Address of Employer</label>
                                                        <input type="text" name="address_of_employer[]" class="form-control" 
                                                        placeholder="Address of Employer">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="type_of_business">Industry</label>
                                                        {!! $select_industry !!}
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name_of_supervisor">Name of Supervisor</label>
                                                        <input type="text" name="name_of_supervisor[]" class="form-control" 
                                                        placeholder="Name of Supervisor">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="title_of_supervisor">Title of Supervisor</label>
                                                        <input type="text" name="title_of_supervisor[]" class="form-control" 
                                                        placeholder="Title of Supervisor">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="position_held">Position Held</label>
                                                        <input type="text" name="position_held[]" class="form-control" 
                                                        placeholder="Position Held">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="category_of_employees_supervised">Category of Employees Supervised</label>
                                                        <input type="text" name="category_of_employees_supervised[]" class="form-control" 
                                                        placeholder="Category of Employees Supervised">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="number_supervised">Number Supervised</label>
                                                        <input type="number" name="number_supervised[]" class="form-control" 
                                                        placeholder="Number Supervised">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="employment_start">Employment Start</label>
                                                        <input type="date" name="employment_start[]" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="employment_end">Employment End</label>
                                                        <input type="date" name="employment_end[]" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="starting_salary">Starting Salary</label>
                                                        <input type="number" name="starting_salary[]" class="form-control" 
                                                        placeholder="Starting Salary">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="salary_at_exit">Salary at Exit</label>
                                                        <input type="number" name="salary_at_exit[]" class="form-control" 
                                                        placeholder="Salary at Exit">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="reason_for_leaving">Reason for Leaving</label>
                                                        <input type="text" name="reason_for_leaving[]" class="form-control" 
                                                        placeholder="Reason for Leaving">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="number_supervised">Description of duties</label>
                                                        <textarea name="description_of_duties[]" class="form-control" rows="5" 
                                                        placeholder="Description of duties"></textarea>
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
                @include('includes.application_sidebar')
            </div>
            
        </div>

    </div>

</div>


@include('includes.footer')
		
</div>

</div> 

@include('includes.js_includes')

<script>
    
    $(document).on('click', '.add-extra-employment', function(){
          var html = '';
          html += '<tr><td><div class="row school_itm">';
          html += '<div class="col-md-12 school_itm_top"><button type="button" class="btn btn-danger btn-sm remove-itm pull-right">Remove</button></div>';
          html += '<div class="col-md-12"><div class="form-group"><label for="name_of_employer">Name of Employer</label><input type="text" name="name_of_employer[]" class="form-control" placeholder="Name of Employer"></div></div>';
          html += '<div class="col-md-12"><div class="form-group"><label for="address_of_employer">Address of Employer</label><input type="text" name="address_of_employer[]" class="form-control" placeholder="Address of Employer"></div></div>';
          html+= '<div class="col-md-6"><div class="form-group"><label for="industry">Industry</label><?php echo $select_industry ?></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="name_of_supervisor">Name of Supervisor</label><input type="text" name="name_of_supervisor[]" class="form-control" placeholder="Name of Supervisor"></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="title_of_supervisor">Title of Supervisor</label><input type="text" name="title_of_supervisor[]" class="form-control" placeholder="Title of Supervisor"></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="position_held">Position Held</label><input type="text" name="position_held[]" class="form-control" placeholder="Position Held"></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="category_of_employees_supervised">Category of Employees Supervised</label>	<input type="text" name="category_of_employees_supervised[]" class="form-control" placeholder="Category of Employees Supervised"></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="number_supervised">Number Supervised</label><input type="number" name="number_supervised[]" class="form-control" placeholder="Number Supervised"></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="employment_start">Employment Start</label><input type="date" name="employment_start[]" class="form-control" ></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="employment_end">Employment End</label><input type="date" name="employment_end[]" class="form-control"></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="starting_salary">Starting Salary</label><input type="number" name="starting_salary[]" class="form-control" placeholder="Starting Salary"></div></div>';
          html += '<div class="col-md-6"><div class="form-group"><label for="salary_at_exit">Salary at Exit</label><input type="number" name="salary_at_exit[]" class="form-control" placeholder="Salary at Exit"></div></div>';
          html += '<div class="col-md-12"><div class="form-group"><label for="reason_for_leaving">Reason for Leaving</label><input type="text" name="reason_for_leaving[]" class="form-control" placeholder="Reason for Leaving"></div></div>';
          html += '<div class="col-md-12"><div class="form-group"><label for="number_supervised">Description of duties</label><textarea name="description_of_duties[]" class="form-control" rows="5" placeholder="Description of duties"></textarea></div></div>';
          html += '</div></td></tr>';
          $('#item_table').append(html);
    });
</script>

@stop
