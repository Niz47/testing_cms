<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Red dot Pre Pay Visa') }}</title>
    <link rel="Shortcut Icon" href="{{ asset('favicon.ico') }} " />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css">
        .google-button {
          height: 40px;
          border-width: 0;
          background: white;
          color: #737373;
          border-radius: 5px;
          white-space: nowrap;
          box-shadow: 1px 1px 0px 1px rgba(0, 0, 0, 0.05);
          transition-property: background-color, box-shadow;
          transition-duration: 150ms;
          transition-timing-function: ease-in-out;
          padding: 0;
        }
        .google-button:focus, .google-button:hover {
          box-shadow: 1px 4px 5px 1px rgba(0, 0, 0, 0.1);
        }
        .google-button:active {
          background-color: #e5e5e5;
          box-shadow: none;
          transition-duration: 10ms;
        }

        .google-button__icon {
          display: inline-block;
          vertical-align: middle;
          margin: 8px 0 8px 8px;
          width: 18px;
          height: 18px;
          box-sizing: border-box;
        }

        .google-button__icon--plus {
          width: 27px;
        }

        .google-button__text {
          display: inline-block;
          vertical-align: middle;
          padding: 0 24px;
          font-size: 14px;
          font-weight: bold;
          font-family: 'Roboto',arial,sans-serif;
        }

        button ~ button {
          margin-left: 20px;
        }
    </style>

</head>
<body>
    <div id="app">
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <!-- <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
                            @if(Auth::user()->can('manage-translations'))
                                <li><a href="{{ url('/translations/view/rdn') }}">Translations</a></li>
                            @endif
                            @if(Auth::user()->can('user-view'))
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">User Management<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/admin/users') }}">Users</a></li>
                                        @if(Auth::user()->can('role-view'))
                                        <li><a href="{{ url('/admin/roles') }}">Roles</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
