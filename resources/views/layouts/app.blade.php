<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/general.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>
    @yield('css')

    <!-- Scripts -->
    <script>
    window.Bukosan = {!! json_encode([
        'csrfToken' => csrf_token(),
        'baseUrl' => url('')
    ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top navbar-main">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            @if(Route::currentRouteName() != 'homepage' || Auth::check())
            <form class="navbar-form navbar-left form-search">
                <div class="input-group">
                    <input type="text" placeholder="Cari Kosan ..." id="searchbox">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <svg focusable="false" width="20" height="20" viewBox="0 0 10 10" data-reactid="13">
                                <path fill="#ffffff" d="M7.73732912,6.67985439 C7.75204857,6.69246326 7.76639529,
                                6.70573509 7.7803301,6.7196699 L9.65165045,8.59099025 C9.94454365,
                                8.8838835 9.94454365,9.3587572 9.65165045,9.65165045 C9.3587572,
                                9.94454365 8.8838835,9.94454365 8.59099025,9.65165045 L6.7196699,
                                7.7803301 C6.70573509,7.76639529 6.69246326,7.75204857 6.67985439,
                                7.73732912 C5.99121283,8.21804812 5.15353311,8.5 4.25,8.5 C1.90278981,
                                8.5 0,6.59721019 0,4.25 C0,1.90278981 1.90278981,0 4.25,0 C6.59721019,
                                0 8.5,1.90278981 8.5,4.25 C8.5,5.15353311 8.21804812,5.99121283
                                7.73732912,6.67985439 L7.73732912,6.67985439 Z M4.25,7.5 C6.04492544,
                                7.5 7.5,6.04492544 7.5,4.25 C7.5,2.45507456 6.04492544,1 4.25,1
                                C2.45507456,1 1,2.45507456 1,4.25 C1,6.04492544 2.45507456,7.5 4.25,
                                7.5 L4.25,7.5 Z" data-reactid="14"></path>
                            </svg>
                        </button>
                    </span>
                </div><!-- /input-group -->
            </form>
            @endif

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                        aria-expanded="false">
                        {{ Auth::user()->username }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
        @endif
    </ul>
</div>
</div>
</nav>

@yield('content')
</div>

<!-- Scripts -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCffoJarkvErxQ-kwrfkctqy2GgFrT-h1M&libraries=places&callback=MapInit"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/form.js') }}"></script>
<script src="{{ asset('js/map.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('js')
</body>
</html>
