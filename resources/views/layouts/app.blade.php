<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Traventure') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTJOuFQhHjI4jec4gTSD4_x0Ke7cI3bRg"
        type="text/javascript">

        </script>

</head>
<body>
    {{--  <div id="app">  --}}
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @guest
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ url('/Traveler/Explore') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    @endguest
                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @guest
                            &nbsp;
                        @else
                            <li><a href="/Traveler/Explore">Explore</a></li>
                            <li><a href="/Traveler/Bookings">Bookings</a></li>
                            <li><a href="/Traveler/Trips">Trips</a></li>
                            <li><a href="/Traveler/Favorites">Favorites</a></li>
                            <li><a href="/Traveler/Messages">Messages</a></li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <span><i></i</span><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->fname }} {{ Auth::user()->lname }}<span class="caret"></span>
                                
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> 
    {{--  </div>  --}}
    
    <div class="container">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.js"></script>
    {{--  <script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>  --}}
    @yield('js')
    {{--  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTJOuFQhHjI4jec4gTSD4_x0Ke7cI3bRg&libraries=places&sensor=false"
        type="text/javascript"></script>
    </scipt>  --}}
</body>
</html