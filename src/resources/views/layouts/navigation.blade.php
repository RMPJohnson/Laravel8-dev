<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                @auth
                <div class="dropdown profile-element text-center">
                    <img alt="image" class="rounded-circle" src="{!! asset('images/profile_small.jpg') !!}">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{auth()->user()->name}}</span>
                        <span class="text-muted text-xs block">Super Admin <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('change-password') }}">Change Password</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
                @endauth
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="{{ route('dashboard') }}"><i class="fa fa-diamond"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
            </li>
            @auth
                @role('Admin')
                <li class="active">
                    <a href="#" aria-expanded="true"><i class="fa fa-edit"></i> <span class="nav-label">Users Management</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse in" aria-expanded="true" style="">
                        <li><a href="{{ route('users.index') }}">Users</a></li>
                        <li><a href="{{ route('roles.index') }}">Roles</a></li>
                    </ul>
                </li>
                @endrole
            @endauth
            <li class="active">
                <a href="#" aria-expanded="true"><i class="fa fa-edit"></i> <span class="nav-label">Directory</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse in" aria-expanded="true" style="">
                    <li><a href="form_basic.html">Category</a></li>
                    <li><a href="form_advanced.html">Profiles</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
