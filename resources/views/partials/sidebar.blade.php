<nav id="sidebar" class="sidebar-wrapper">
				
    <!-- Sidebar brand start  -->
    <div class="sidebar-brand">
        <a href="" class="logo">
            <img class="logo_sidebar" src="{{ asset('assets/img/prf_logo.webp') }}" alt="Admin Logo" />
        </a>
    </div>
    <!-- Sidebar brand end  -->

    <!-- Sidebar content start -->
    <div class="sidebar-content">

        <!-- sidebar menu start -->
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">General</li>
                <li class="sidebar-dropdown active">
                    <a href="{{ url('/dashboard') }}" style="font-size: 15px;">
                        <i class="icon-home1 "></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-dropdown">
                    <a href="#" style="font-size: 15px;">
                        <i class="icon-create_new_folder "></i>
                        <span class="menu-text">Department</span>
                        <span class="icon-plus" style="font-size: 12px; color:gray;"></span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('departments.index') }}" style="font-size: 13px; ">Departments</a>
                            </li>
                            <li>
                                <a href="calendar.html" style="font-size: 13px;">Sub-Department</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="sidebar-dropdown">
                    <a href="#" style="font-size: 15px;">
                        <i class="icon-create_new_folder "></i>
                        <span class="menu-text">Designation</span>
                        <span class="icon-plus" style="font-size: 12px; color:gray;"></span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('designations.index') }}" style="font-size: 13px; ">Designations</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="sidebar-dropdown">
                    <a href="#" style="font-size: 15px;">
                        <i class="icon-users "></i>
                        <span class="menu-text">Employees</span>
                        <span class="icon-plus" style="font-size: 12px; color:gray;"></span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('employees.index') }}" style="font-size: 13px;">Employees</a>
                            </li>
                            <li>
                                <a href="{{ route('employees.documents') }}" style="font-size: 13px;">Documents</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="sidebar-dropdown">
                    <a href="#" style="font-size: 15px;">
                        <i class="icon-flight_takeoff "></i>
                        <span class="menu-text">Manage Leave</span>
                        <span class="icon-plus" style="font-size: 12px; color:gray;"></span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('leave_type.index') }}" style="font-size: 13px;">Leave Type</a>
                            </li>
                            <li>
                                <a href="{{ route('leave.index') }}" style="font-size: 13px;">Leave application</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="sidebar-dropdown">
                    <a href="#" style="font-size: 15px;">
                        <i class="icon-shield "></i>
                        <span class="menu-text">Award</span>
                        <span class="icon-plus" style="font-size: 12px; color:gray;"></span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="calendar.html" style="font-size: 13px;">Award list</a>
                            </li>
                        </ul>
                    </div>
                </li>


                {{-- <li class="sidebar-dropdown">
                    <a href="#" style="font-size: 15px;">
                        <i class="icon-user "></i>
                        <span class="menu-text">Attendance</span>
                        <span class="icon-plus" style="font-size: 12px; color:gray;"></span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="calendar.html" style="font-size: 13px;">Attendance form</a>
                            </li>
                            <li>
                                <a href="calendar.html" style="font-size: 13px;">Monthly attendance</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                @canany(['view permission','view role','view user'])
                <li class="sidebar-dropdown">
                    <a href="#" style="font-size: 15px;">
                        <i class="icon-user1 "></i>
                        <span class="menu-text">Manage User</span>
                        <span class="icon-plus" style="font-size: 12px; color:gray;"></span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            @can('view permission')<li><a href="{{ url('permissions') }}" style="font-size: 13px;">Permissions</a></li>@endcan
                            @can('view role')<li><a href="{{ url('roles') }}" style="font-size: 13px;">Roles</a></li>@endcan
                            @can('view user')<li><a href="{{ url('users') }}" style="font-size: 13px;">Users</a></li>@endcan
                        </ul>
                    </div>
                </li>
                @endcanany

                <li class="sidebar-dropdown">
                    <a href="#" style="font-size: 15px;">
                        <i class="icon-business_center "></i>
                        <span class="menu-text">Reports</span>
                        <span class="icon-plus" style="font-size: 12px; color:gray;"></span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="calendar.html" style="font-size: 13px;">Employee report</a>
                            </li>
                            <li>
                                <a href="calendar.html" style="font-size: 13px;">Leave report</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-dropdown">
                    <a href="#" style="font-size: 15px;">
                        <i class="icon-bell "></i>
                        <span class="menu-text">Notice Board</span>
                        <span class="icon-plus" style="font-size: 12px; color:gray;"></span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="calendar.html" style="font-size: 13px;">Notice</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <li>
                    <a href="" style="font-size: 15px;">
                        <i class="icon-chat_bubble "></i>
                        <span class="menu-text">Messages</span>
                    </a>
                </li> --}}

                <li>
                    <a href="" style="font-size: 15px; ">
                        <i class="icon-settings "></i>
                        <span class="menu-text">Settings</span>
                    </a>
                </li>

                <li>
                    <a style="font-size: 15px;" href="{{ route('logout') }}">
                    <i class="icon-log-out"></i>
                    <span class="menu-text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end -->

    </div>
    <!-- Sidebar content end -->
    
</nav>