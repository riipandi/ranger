<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}"/>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-ranger">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {!! config('app.name', trans('titles.app')) !!}<sup class="text-muted text-small font-italic">beta</sup>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="sr-only">{!! trans('titles.toggleNav') !!}</span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- Left Side Of Navbar --}}
                    <ul class="navbar-nav mr-auto">
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        @endauth
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('whois.index') }}">{{ __('Whois') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('toolbox.ip') }}">{{ __('My IP') }}</a>
                        </li>
                        {{-- @role('admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {!! __('Toolbox') !!}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item {{ Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'active' : null }}" href="{{ url('/users') }}">
                                        @lang('titles.adminUserList')
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item {{ Request::is('users/create') ? 'active' : null }}" href="{{ url('/users/create') }}">
                                        @lang('titles.adminNewUser')
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item {{ Request::is('themes','themes/create') ? 'active' : null }}" href="{{ url('/themes') }}">
                                        @lang('titles.adminThemesList')
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item {{ Request::is('logs') ? 'active' : null }}" href="{{ url('/logs') }}">
                                        @lang('titles.adminLogs')
                                    </a>
                                </div>
                            </li>
                        @endrole --}}
                    </ul>
                    {{-- Right Side Of Navbar --}}
                    <ul class="navbar-nav ml-auto">
                        {{-- Authentication Links --}}
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            {{-- <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li> --}}
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->realname }}</a>
                                <div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.setting') }}"><i class="fe fe-equalizer mr-2"></i>{{ __('Account Setting') }}</a>
                                    <a class="dropdown-item" href="{{ route('user.password') }}"><i class="fe fe-key mr-2"></i>{{ __('Change Password') }}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="fe fe-logout mr-2"></i>{{ __('Log Out') }}</a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">Place sticky footer content here.</span>
            <span class="text-muted float-right">Place sticky footer content here.</span>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> --}}
    @include('sweet::alert')
    @stack('scripts')
</body>
</html>
