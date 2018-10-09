@extends('layouts.auth')

@section('title', 'Welcome')

@section('content')
    <div class="min-h-full h-full w-full flex flex-col items-center justify-center">
        @if (Route::has('login'))
            <div class="absolute pin-t pin-r m-8">
                <ul class="list-reset flex items-center -mr-6">
                    @auth
                        <li class="mr-6"><a class="font-semibold text-blue-dark no-underline hover:underline" href="{{ route('dashboard') }}">Dashboard</a></li>
                    @else
                        <li class="mr-6"><a class="font-semibold text-blue-dark no-underline hover:underline" href="{{ route('login') }}">Sign in</a></li>
                        <li class="mr-6"><a class="font-semibold text-blue-dark no-underline hover:underline" href="{{ route('register') }}">Sign up</a></li>
                    @endauth
                </ul>
            </div>
        @endif

        <h1 class="font-light text-5xl mb-6">{{ config('app.name') }}</h1>

        <ul class="list-reset flex flex-col sm:flex-row items-center -mb-4 sm:-mr-6">
            <li class="mb-4 sm:mr-6"><a class="text-blue-dark no-underline hover:underline" href="//laravel.com/docs">Documentation</a></li>
            <li class="mb-4 sm:mr-6"><a class="text-blue-dark no-underline hover:underline" href="//laracasts.com">Laracasts</a></li>
            <li class="mb-4 sm:mr-6"><a class="text-blue-dark no-underline hover:underline" href="//laravel-news.com">News</a></li>
            <li class="mb-4 sm:mr-6"><a class="text-blue-dark no-underline hover:underline" href="//github.com/riipandi/laravel-start">Laravel Start</a></li>
        </ul>
    </div>
@endsection
