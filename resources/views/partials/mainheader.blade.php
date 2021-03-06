<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Matix</b> Web</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b> App </b>Media Web </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- <li class="dropdown messages-menu">
                    <!-- Menu toggle button
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <!-- <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            inner menu: contains the messages
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <div class="pull-left">

                                            <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                                        </div>

                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>

                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul><!-- /.menu
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li> -->

                <!-- Notifications Menu -->
                <!-- <li class="dropdown notifications-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>

                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>

                <li class="dropdown tasks-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>

                            <ul class="menu">
                                <li>
                                    <a href="#">

                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>

                                        <div class="progress xs">

                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li> -->
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="/upload/users/{{ Auth::user()->photo }}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="/upload/users/{{ Auth::user()->photo }}" class="img-circle" alt="User Image" />
                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->role }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">

                            <div class="col-xs-4 text-center">
                                <a href="{{route('projectos.index')}}">Proyectos</a>
                            </div>
                          @if(Auth::user()->agent()||Auth::user()->developer())
                            <div class="col-xs-4 text-center">
                                <a href="{{route('seguimientos.index')}}">Seguimientos</a>
                            </div>

                            <div class="col-xs-4 text-center">
                                <a href="{{route('servicios.index')}}">Servicios</a>
                            </div>
                          @endif

                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">


                              <a href="{{route('perfil.edit',Auth::user()->profile->id)}}" class="btn btn-default btn-flat">Editar Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
