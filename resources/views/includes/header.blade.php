<header id="header">

    <div class="navigation">
        <div class="container">
            <div class="nav-ins">
                <div class="brand">
                    <a href="{{ route('index') }}">RecruitPro</a>
                </div>

                <div class="nav-mini-wrapper">
                    <ul class="nav-main">
                        <li><a href="{{ route('employers') }}">Employers</a></li>

                        <li><a href="{{ route('jobseekers') }}">Job Seekers</a></li>

                        <li><a href="{{ route('jobs') }}">Job Openings</a></li>
                    </ul>

                    <ul class="nav-mini sign-in">
                        @if (Auth::guest())
                            <li>
                                <a href="{{ route('login') }}">login</a>
                            </li>
                        
                            <li>
                                <a href="{{ route('register') }}">sign up</a>
                            </li>
                        
                        @else
                            <li>
                                <a href="{{ route('profile') }}">Profile</a>
                            </li>
                            
                            <li>
                                <a href="{{ route('job_application.index') }}">My Applications</a>
                            </li>
                            
                            <li>
                                <a href="#" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</header>