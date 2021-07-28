@extends('admin.layouts.adminlayout')

@section('content')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    @include('admin.includes.sidebar');

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        
                        <div class="widget-heading">
                            <div class="">
                                <h5 class="">{{ $organization->name_of_organization }} Organization Details</h5>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                <div class="table table-striped">
                                    <table width="100%">
                                        <tr>
                                            <td width="20%">Name of Organization</td>
                                            <td width="80%">{{ $organization->name_of_organization }}</td>
                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $organization->email }}</td>
                                        </tr>

                                        <tr>
                                            <td>Nature of Business</td>
                                            <td>{{ $organization->nature_of_business }}</td>
                                        </tr>

                                        <tr>
                                            <td>Sector of Operation</td>
                                            <td>{{ $organization->sector_of_operation }}</td>
                                        </tr>

                                        <tr>
                                            <td>Year Established</td>
                                            <td>{{ $organization->year_established }}</td>
                                        </tr>

                                        <tr>
                                            <td>Staff Strenght</td>
                                            <td>{{ $organization->staff_strenght }}</td>
                                        </tr>

                                        <tr>
                                            <td>Annual Turnover</td>
                                            <td>N{{ number_format($organization->annual_turnover,2) }}</td>
                                        </tr>

                                        <tr>
                                            <td>Profit Before Tax</td>
                                            <td>N{{ number_format($organization->profit_before_tax,2) }}</td>
                                        </tr>

                                    </table>
                                </div>
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
