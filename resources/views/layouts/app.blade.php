<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-ranger">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li> --}}
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->realname }}</a>
                                <div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('dashboard') }}"><i class="fe fe-home mr-2"></i>{{ __('Dashboard') }}</a>
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
