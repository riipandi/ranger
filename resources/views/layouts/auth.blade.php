<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Manifest -->
        <meta name="theme-color" content="4188c9">
        <meta name="MobileOptimized" content="320">
        <meta name="HandheldFriendly" content="true">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="msapplication-navbutton-color" content="#4188c9">
        <meta name="msapplication-starturl" content="{{ url('/') }}">
        <link rel="manifest" href="{{ route('pwa.manifest') }}">

        <!-- Title and Favicon -->
        <title>@hasSection('title') @yield('title') &dash; {{ config('app.name') }} @else {{ config('app.name') }} @endif</title>
        @hasSection('description')<meta name="description" content="@yield('description')">@endif
        <link href="{{ asset('favicon.ico') }}" type="image/x-icon" rel="shortcut icon">
        <link href="{{ asset('favicon.ico') }}" type="image/x-icon" rel="icon">

        <!-- Stylesheet -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="font-sans font-normal roman text-base tracking-normal leading-normal bg-white text-grey-darker antialiased min-h-full h-full">
        <div id="app" class="min-h-full h-full">
            @hasSection('content')
                @yield('content')
            @endif
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
