    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>    
    
    <body>
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top m-b-0">
                <div class="navbar-header"> 
                    <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i><span class="fa fa arrow"></span></i></a>
                    <div class="top-left-part">
                        <a class="logo" href="{{ route('Admin.HomePage') }}"><img src="{{ asset('/uploads/files/logo-navbar.png') }}"/><span style="margin-left:5%" class="hidden-xs"><b>TRAVENTURE</b></span></a>
                    </div>
                    
                    <ul class="nav navbar-top-links navbar-right pull-right">
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b><div class="username hidden-xs">{{ Auth::user()->name }}</div></b><div class="visible-xs"><i class="fa fa-user"></i></div></a>
                            <ul class="dropdown-menu dropdown-user animated flipInY">
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i>
                                            Logout</a>
                                    <form id="logout-form" action="{{ 'App\Admin' == Auth::getProvider()->getModel() ?  route('Admin.Logout'): route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Top Navigation -->
            <!-- Left navbar-header -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                    <ul class="nav" id="side-menu">
                        <li class="user-pro">
                            <a class="waves-effect"><span class="hide-menu">Hi, <b>{{ Auth::user()->name }}!</b></a>
                        </li>
                        <li class="nav-small-cap m-t-10">--- Main Menu</li>
                        <li> 
                            <a href="{{ route('Admin.HomePage') }}" class="waves-effect"><i class="fa fa-tachometer" style="margin-right:5%"></i> <span class="hide-menu"> Dashboard</span></a>
                        </li>
                        <li> 
                            @if($totalRequests > 0)
                                <a href="{{ route('Admin.RequestsPage') }}"><i class="fa fa-user-plus" style="margin-right:5%"></i><span class="hide-menu"><span class="hide-menu">Requests</span>
                                <span class="label label-rouded label-danger pull-right">{{ $totalRequests }}</span></a>
                            @else 
                                 <a href="{{ route('Admin.RequestsPage') }}"><i class="fa fa-user-plus" style="margin-right:5%"></i><span class="hide-menu"><span class="hide-menu">Requests</span></a>
                            @endif
                        </li>
                        <li> 
                            <a href="{{ route('Admin.StatusPage') }}"><i class="fa fa-users" style="margin-right:5%"></i><span class="hide-menu">Status</span></a>
                        </li>
                    </ul>
                </div>
            </div>
@yield('content')
</html>