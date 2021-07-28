<?php

?>
@extends('admin.layouts.adminlayout')

@section('content')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    @include('admin.includes.sidebar');

    
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        <div class="widget-heading">
                            <div class="">
                                <h5 class="">Delete {{ $organization->name_of_organization }}</h5>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="form_wrap">
                                <form action="{{ route('admin.organizations.destroy') }}" method="POST" class="forms-sample">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="orgnization_id" value="{{ $organization->organization_id }}">
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name_of_organization">Organization Name</label>
                                                <input type="text" name="name_of_organization" class="form-control" 
                                                value="{{ $organization->name_of_organization }}" 
                                                placeholder="Organization Name" readonly>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" class="form-control" 
                                                value="{{ $organization->email }}" placeholder="Email" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nature_of_business">Nature of Business</label>
                                                <input type="text" name="nature_of_business" class="form-control" 
                                                value="{{ $organization->nature_of_business }}" placeholder="Nature of Business" readonly>
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sector_of_operation">Sector of Operation</label>
                                                <input type="text" name="sector_of_operation" class="form-control" 
                                                value="{{ $organization->sector_of_operation }}" placeholder="Sector of Operation" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="year_established">Year Established</label>
                                                <select name="year_established" class="form-control">
                                                    <option value=""></option>
                                                    <?php
                                                        for ($i=1920; $i < 2020; $i++) { 
                                                            ?>
                                                            <option value="{{ $i }}" <?php if($organization->year_established == $i) echo 'selected' ?>>{{ $i }}</option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="staff_strenght">Staff Strenght</label>
                                                <select name="staff_strenght" class="form-control">
                                                    <option value=""></option>
                                                    <?php
                                                        for ($a=2; $a < 100; $a++) { 
                                                            ?>
                                                            <option value="{{ $a }}" <?php if($organization->staff_strenght == $a) echo 'selected' ?>>{{ $a }}</option>
                                                            <?php
                                                        }
                                                    ?>
                                                    <option value="100">over 100</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="annual_turnover">Annual Turnover</label>
                                                <input type="text" name="annual_turnover" class="form-control" 
                                                value="{{ $organization->annual_turnover }}" placeholder="Annual Turnover" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="profit_before_tax">Profit Before Tax</label>
                                                <input type="text" name="profit_before_tax" class="form-control" 
                                                value="{{ $organization->profit_before_tax }}" placeholder="Profit Before Tax" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary mr-2">Delete Organization</button>
                                            <a hre="" class="btn btn-light">Cancel</a>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>




            </div>

        </div>

        @include('admin.includes.footer');
        
    </div>
    <!--  END CONTENT PART  -->

</div>
<!-- END MAIN CONTAINER -->


@include('admin.includes.js_includes');

<script src="assets/plugins/apex/apexcharts.min.js"></script>
<script src="assets/js/dashboard/dash_2.js"></script>


@endsection
