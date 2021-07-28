<div class="overlay"></div>
<div class="search-overlay"></div>

<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">
    
    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle">
                    <div class="nav_itm">
                        <i class="la la-home"></i>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('admin.organizations') }}" class="dropdown-toggle">
                    <div class="nav_itm">
                        <i class="la la-building"></i>
                        <span>Organizations</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('admin.job_profiles') }}" class="dropdown-toggle">
                    <div class="nav_itm">
                        <i class="la la-briefcase"></i>
                        <span>Jobs</span>
                    </div>
                </a>
            </li>


            <li class="menu">
                <a href="{{ route('admin.users') }}" class="dropdown-toggle">
                    <div class="nav_itm">
                        <i class="la la-users"></i>
                        <span>Users</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('admin.portal_admins.index') }}" class="dropdown-toggle">
                    <div class="nav_itm">
                        <i class="la la-user"></i>
                        <span>Portal Admins</span>
                    </div>
                </a>
            </li>


            <li class="menu">
                <a href="" aria-expanded="false" class="dropdown-toggle">
                    <div class="nav_itm">
                        <i class="fa fa-gear"></i>
                        <span>Settings</span>
                    </div>
                </a>
            </li>
            
        </ul>           
    </nav>

</div>
<!--  END SIDEBAR  -->