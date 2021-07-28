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
                            <div class="widget-head-ins">
                                <h5 class="">Organizations</h5>

                                <div class="top_btn">
                                    <a href="{{ route('admin.organizations.create') }}" class="btn btn-primary btn-sm">Create Organization</a>
                                </div> 
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                <div class="table-responsive">
                                    @if(isset($organizations) && $organizations->count() > 0)
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name of Org</th>
                                                <th>Email</th>
                                                <th>Nature of Business</th>
                                                <th>Year Established</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($organizations as $organization)
                                            <tr>
                                                <td>{{ $organization->name_of_organization }}</td>
                                                <td>{{ $organization->email }}</td>
                                                <td>{{ $organization->nature_of_business }}</td>
                                                <td>{{ $organization->year_established }}</td>
                                                <td>
                                                    <div class="edit-btn-wrap">
                                                        <div class="edit-btn">
                                                            <a href="{{ route('admin.organizations.detail', ['id' => $organization->organization_id]) }}" title="Detail">
                                                                <i class="la la-eye"></i> 
                                                            </a>
                                                        </div>

                                                        <div class="edit-btn">
                                                            <a href="{{ route('admin.organizations.edit', ['id' => $organization->organization_id]) }}" title="Edit">
                                                                <i class="la la-edit"></i> 
                                                            </a>
                                                        </div>

                                                        <div class="edit-btn">
                                                            <a href="{{ route('admin.organizations.delete', ['id' => $organization->organization_id]) }}" title="Delete">
                                                                <i class="la la-trash"></i> 
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>There are no organizations added</p>
                                    @endif
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
