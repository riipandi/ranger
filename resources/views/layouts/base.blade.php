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
        <div id="app" class="bg-grey-lighter flex flex-col min-h-screen">

            @include('partials.header')
            
            @hasSection('content')
                @yield('content')
            @endif
            
            <!-- Footer -->
            <div class="bg-white border-t">
                <div class="container mx-auto px-4">
                    <div class="md:flex justify-between items-center text-sm">
                        <div class="text-center md:text-left py-3 md:py-4 border-b md:border-b-0">
                            <a href="javascript:;" class="no-underline text-grey-dark mr-4">Home</a>
                            <a href="javascript:;" class="no-underline text-grey-dark mr-4">Careers</a>
                            <a href="javascript:;" class="no-underline text-grey-dark">Legal &amp; Privacy</a>
                        </div>
                        <div class="md:flex md:flex-row-reverse items-center py-4">
                            {{--
                            <div class="text-center mb-4 md:mb-0 md:flex md:ml-4">
                                <div class="w-48 inline-block relative mb-4 md:mb-0 md:mr-4">
                                <select class="leading-tight text-grey-dark block appearance-none w-full bg-white border border-grey-light px-3 py-2 pr-8 rounded">
                                    <option>English</option>
                                    <option>Indonesia</option>
                                </select>
                                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                                </div>
                                <div>
                                <a href="javascript:;" class="inline-block leading-tight bg-blue border border-blue-dark hover:bg-blue-dark px-3 py-2 text-white no-underline rounded">Need help?</a>
                                </div>
                            </div>
                            --}}
                            <div class="text-grey text-center">&copy; 2018 {{ config('app.name') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
