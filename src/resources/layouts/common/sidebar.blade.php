<aside class="main-sidebar sidebar-sea-blue">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="brand-image img-circle">
        <span class="brand-text font-weight-light">HR-BLOCK</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Home -->
                <li class="nav-item">
                    <a href="{{ url('home') }}" class="nav-link my-0 rounded-0 {{ request()->is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Home</p>
                    </a>
                </li>
                <!-- Clockin -->
                <li class="nav-item has-treeview {{ request()->is('clockin/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link my-0 rounded-0 {{ request()->is('clockin/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clock"></i><p>Clockin <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('clockin/add/create') }}" class="nav-link my-0 rounded-0 {{ (request()->is('clockin/add') || request()->is('clockin/add*')) ? 'active' : '' }}">
                                <i class="fas fa-user-clock nav-icon"></i><p>Clockin</p>
                            </a>
                        </li>
                        @foreach(Auth::user()->roles()->pluck('name') as $role)
                            @if($role === 'Super Admin' || $role === 'Admin' || $role=='Manager')
                                <li class="nav-item">
                                    <a href="{{ url('clockin/index') }}"
                                    class="nav-link my-0 rounded-0 {{ (request()->is('clockin/index') || request()->is('clockin/index/*')) ? 'active' : '' }}">
                                        <i class="fas fa-history nav-icon"></i><p>Clockin Log</p>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>

                <!-- User Schedule -->
                <li class="nav-item has-treeview {{ request()->is('user-schedule/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link nav-link my-0 rounded-0{{ request()->is('user-schedule/*') ? 'active' : '' }}">
                        <i class="fas fa-calendar-alt nav-icon"></i><p>Shedule <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('user-schedule/index') }}" class="nav-link my-0 rounded-0 {{ (request()->is('user-schedule') || request()->is('user-schedule/*')) ? 'active' : '' }}">
                                <i class="fas fa-calendar-alt nav-icon"></i><p>My Calendar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                @foreach(Auth::user()->roles()->pluck('name') as $role)
                    @if($role === 'Super Admin' || $role === 'Admin' || $role=='Manager')
                        <li class="nav-item has-treeview {{ request()->is('admin/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link nav-link my-0 rounded-0 {{ request()->is('admin/*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i><p>Users Management <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/users" class="nav-link my-0 rounded-0 {{ (request()->is('admin/users') || request()->is('admin/users/*')) ? 'active' : '' }}">
                                        <i class="fas fa-user nav-icon"></i><p>Users</p>
                                    </a>
                                </li>
                                
                                @if($role === 'Super Admin' || $role === 'Admin')
                                    <li class="nav-item">
                                        <a href="/admin/roles" class="nav-link my-0 rounded-0 {{ (request()->is('admin/roles') || request()->is('admin/roles/*')) ? 'active' : '' }}">
                                            <i class="fas fa-plus-circle nav-icon"></i><p>Roles</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/admin/permissions" class="nav-link my-0 rounded-0 {{ (request()->is('admin/permissions') || request()->is('admin/permissions/*')) ? 'active' : '' }}">
                                            <i class="fas fa-lock nav-icon"></i><p>Permissions</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/management/team/index') }}" class="nav-link my-0 rounded-0 {{ (request()->is('/management/team/index')) ? 'active' : '' }}">
                                            <i class="fas fa-sitemap nav-icon"></i><p>Team Organization</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>

                        <li class="nav-item has-treeview {{ request()->is('management/*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link nav-link my-0 rounded-0 {{ request()->is('management/*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-clipboard-check"></i><p>Management <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/management/incident/index') }}" class="nav-link my-0 rounded-0 {{ (request()->is('management/incident/*')) ? 'active' : '' }}">
                                        <i class="fas fa-exclamation-circle nav-icon"></i><p>Incident</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/management/team-schedule/index') }}" class="nav-link my-0 rounded-0 {{ (request()->is('management/team-schedule/index')) ? 'active' : '' }}">
                                        <i class="fas fa-calendar-check nav-icon"></i><p>Team Schedule</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/management/team-schedule/team-calendar') }}" class="nav-link my-0 rounded-0 {{ (request()->is('/management/team-schedule/team-calendar')) ? 'active' : '' }}">
                                        <i class="fas fa-calendar-alt nav-icon"></i><p>Team Calendar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @break
                    @endif
                @endforeach
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
