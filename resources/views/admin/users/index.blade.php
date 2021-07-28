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
                                <h5 class="">Users</h5>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="widget-cont-ins"> 
                                @if(isset($users) && $users->count() > 0)
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th width="30%">Name</th>
                                                <th width="15%">Email</th>
                                                <th width="15%">Phone</th>
                                                <th width="8%">Sex</th>
                                                <th width="17%">Date of Birth</th>
                                                <th width="10%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->telephone }}</td>
                                                <td>{{ $user->sex }}</td>
                                                <td>{{ $user->date_of_birth }}</td>
                                                <td>
                                                    <div class="edit-btn-wrap">
                                                        <div class="edit-btn">
                                                            <a href="{{ route('admin.users.detail', ['id' => $user->id]) }}" title="Detail">
                                                                <i class="la la-eye"></i> 
                                                            </a>
                                                        </div>

                                                        <div class="edit-btn">
                                                            <a href="{{ route('admin.users.suspend', ['id' => $user->id]) }}" title="Suspend Account">
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

        @include('admin.includes.footer');
        
    </div>
    <!--  END CONTENT PART  -->

</div>
<!-- END MAIN CONTAINER -->


@include('admin.includes.js_includes');

<script src="assets/plugins/apex/apexcharts.min.js"></script>
<script src="assets/js/dashboard/dash_2.js"></script>


@endsection
