
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="" class="site_title"><i class="fa fa-university"></i> <span>UTM Staff Club</span></a>
            <p class="pt-4"><img src="../../resource/images/staff.jpg" width="80px"  class="img-fluid mb-3" alt="utm"></p>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="../../resource/images/img.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>UTM Staff Club</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('dashboard')}}">Dashboard</a></li>

                        </ul>
                    </li>

                        <li>
                            <a><i class="fa fa-edit"></i> Staff Management <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                @if(Auth::user()->user_type == 1)
                                <li><a href="{{ url('employees') }}">Edit Staff</a></li>
                                @endif
                                <li><a href="{{ url('staffdirectory') }}">Staff Directory</a></li>
                            </ul>
                        </li>
                </ul>

                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-calendar"></i>Event <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            @if(Auth::user()->user_type == 3)
                            <li><a href="{{ url('secretary/dashboard') }}">Create Event</a></li>
                                <li><a href="{{ url('events') }}">Edit Event Calender</a></li>
                            @endif

                                @if(Auth::user()->user_type != 3)
                            <li><a href="{{ url('secretary/dashboard') }}">View Event Calender</a></li>
                                @endif
                        </ul>
                    </li>
                </ul>

                @if(Auth::user()->user_type !== 5 )
                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-clone"></i>Meeting <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                                <li><a href="{{ url('staff/requestMeeting') }}">Schedule Meeting</a></li>
                            <li><a href="{{ url('viewMeeting') }}">Meeting Requests</a></li>

                        </ul>
                    </li>
                </ul>
                @endif
                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-camera-retro fa-3x"></i>Media <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                                <li><a href="{{ url('media') }}">Event Pictures</a></li>
                                  <li><a href="{{ url('pictures') }}">Pictures</a></li>
                        </ul>
                    </li>
                </ul>
                    <ul class="nav side-menu">
                        <li>
                            <a><i class="fa fa-ticket"></i>Booking <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                @if(Auth::user()->user_type == 3)
                                    <li><a href="{{ url('create-ticket') }}">Create Ticket</a></li>
                                @endif
                                <li><a href="{{ url('tickets') }}">Tickets</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav side-menu">
                        <li>
                            <a><i class="fa fa-users"></i>Activities <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">

                                    @if(Auth::user()->user_type == 3)
                                    <li><a href="{{ url('create-tournament') }}">Create Tournament</a></li>
                                    @endif
                                    <li><a href="">View Teams</a></li>

                                    @if(Auth::user()->user_type == 3)
                                        <li><a href="{{ url('create-class') }}">Create Class</a></li>
                                    @endif
                                    <li><a href="{{ url('class') }}">Activity class registration</a></li>

                            </ul>
                        </li>
                    </ul>
                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-gamepad"></i>Poll <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            @if(Auth::user()->user_type == 3)
                                <li><a href="{{ url('create-poll') }}">Create Poll</a></li>
                                <li><a href="{{ url('poll') }}">View Polls</a></li>
                                <li><a href="{{ url('poll-result') }}">Poll Result</a></li>
                            @endif
                            <li><a href="{{ url('polls') }}">Poll</a></li>
                        </ul>
                    </li>
                </ul>




                    @if(Auth::user()->user_type == 4)
                    <ul class="nav side-menu">
                        <li>
                            <a><i class="fa fa-calculator"></i>Accounting <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                    <li><a href="/events">Expenses</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>


                    <ul class="nav side-menu">
                        <li>
                            <a><i class="fa fa-users"></i>Blog <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                    <li><a href="{{ url('/blog') }}">Create Blog</a></li>

                            </ul>
                        </li>
                    </ul>



            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="../../src/store/Logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('uploads/'.Auth::user()->user_profile) }}" alt="">

                        {{Auth::user()->name}}

                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{ url('/profile') }}"><i class="fa fa-user pull-right"></i>View Profile</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope"></i>
                        <span class="badge bg-green"></span>
                    </a>

                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <div class="text-center">
                                <a href="{{ url('/message') }}">
                                    <strong>Messages</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>

    </div>
</div>
<!-- /top navigation -->
