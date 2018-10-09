@extends('layouts.auth')
@section('title', 'Sign up')

@section('content')
    <div class="min-h-full h-full bg-grey-lightest flex flex-col items-center overflow-auto">
        <div class="m-auto max-w-md sm:px-8">
            <div class="m-8">
                <div class="text-xl text-center mb-8">
                    <a class="text-grey-darker hover:text-grey-darkest no-underline" href="/">{{ config('app.name') }}</a>
                </div>

                @include('partials.alert')

                <div class="bg-white rounded">
                    <div class="block rounded-t w-full h-2 bg-blue"></div>

                    <form class="w-full border border-t-0 rounded-b p-8" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="text-lg text-grey-darkest text-center mb-6">Register an account</div>

                        <div class="block mb-4">
                            <div class="relative">
                                <div class="absolute pin-y pin-l flex items-center text-grey pointer-events-none pl-3">
                                    <svg class="fill-current w-4 h-4">
                                        <use xlink:href="{{ asset('svg/sprite.feathericon.svg#user') }}"></use>
                                    </svg>
                                </div>
                                <input autofocus required type="text" name="name" placeholder="Real Name" value="{{ old('name') }}" class="block appearance-none outline-none w-full h-full border focus:border-blue bg-grey-lightest text-grey-darker py-3 pr-3 pl-9 rounded{{ $errors->first('name', ' border-red') }}" />
                            </div>
                            @if ($errors->has('name'))<div class="mt-2 text-sm font-semibold text-red-light">{{ $errors->first('name') }}</div>@endif
                        </div>

                        <div class="block mb-4">
                            <div class="relative">
                                <div class="absolute pin-y pin-l flex items-center text-grey pointer-events-none pl-3">
                                    <svg class="fill-current w-4 h-4">
                                        <use xlink:href="{{ asset('svg/sprite.feathericon.svg#mail') }}"></use>
                                    </svg>
                                </div>
                                <input required type="email" name="email" placeholder="Email address" value="{{ old('email') }}" class="block appearance-none outline-none w-full h-full border focus:border-blue bg-grey-lightest text-grey-darker py-3 pr-3 pl-9 rounded{{ $errors->first('email', ' border-red') }}" />
                            </div>

                            @if ($errors->has('email'))
                                <div class="mt-2 text-sm font-semibold text-red-light">{{ $errors->first('email') }}</div>
                            @endif
                        </div>


                        <div class="block mb-4">
                            <div class="relative">
                                <div class="absolute pin-y pin-l flex items-center text-grey pointer-events-none pl-3">
                                    <svg class="fill-current w-4 h-4">
                                        <use xlink:href="{{ asset('svg/sprite.feathericon.svg#info') }}"></use>
                                    </svg>
                                </div>
                                <input autofocus required type="text" name="username" placeholder="Username" value="{{ old('username') }}" class="block appearance-none outline-none w-full h-full border focus:border-blue bg-grey-lightest text-grey-darker py-3 pr-3 pl-9 rounded{{ $errors->first('name', ' border-red') }}" />
                            </div>
                            @if ($errors->has('username'))<div class="mt-2 text-sm font-semibold text-red-light">{{ $errors->first('username') }}</div>@endif
                        </div>

                        <div class="flex flex-wrap -mx-2 mb-4 mt-4">
                            <div class="w-full sm:w-1/2 px-2 mb-4 sm:mb-0">
                            <div class="relative">
                                    <div class="absolute pin-y pin-l flex items-center text-grey pointer-events-none pl-3">
                                        <svg class="fill-current w-4 h-4">
                                            <use xlink:href="{{ asset('svg/sprite.feathericon.svg#lock') }}"></use>
                                        </svg>
                                    </div>
                                    <input required type="password" name="password" placeholder="Password" class="block appearance-none outline-none w-full h-full border focus:border-blue bg-grey-lightest text-grey-darker py-3 pr-3 pl-9 rounded{{ $errors->first('password', ' border-red') }}" />
                                </div>
                                @if ($errors->has('password'))<div class="mt-2 text-sm font-semibold text-red-light">{{ $errors->first('password') }}</div>@endif
                            </div>
                            <div class="w-full sm:w-1/2 px-2 mb-4 sm:mb-0">
                                <div class="relative">
                                    <div class="absolute pin-y pin-l flex items-center text-grey pointer-events-none pl-3">
                                        <svg class="fill-current w-4 h-4">
                                            <use xlink:href="{{ asset('svg/sprite.feathericon.svg#lock') }}"></use>
                                        </svg>
                                    </div>
                                    <input required type="password" name="password_confirmation" placeholder="Confirm password" class="block appearance-none outline-none w-full h-full border focus:border-blue bg-grey-lightest text-grey-darker py-3 pr-3 pl-9 rounded{{ $errors->first('password_confirmation', ' border-red') }}" />
                                </div>
                                @if ($errors->has('password_confirmation'))<div class="mt-2 text-sm font-semibold text-red-light">{{ $errors->first('password_confirmation') }}</div>@endif
                            </div>
                        </div>

                        <div class="flex items-center justify-between mb-4">
                            <label class="flex items-center select-none cursor-pointer" for="agree">
                                <input required type="checkbox" name="agree" id="agree" {{ old('agree') ? 'checked' : '' }} />
                                <span class="text-sm ml-2">
									I accept <a href="javascript:;" class="text-blue no-underline hover:underline">term of use</a>
									and <a href="javascript:;" class="text-blue no-underline hover:underline">agreement</a>.
								</span>
                            </label>
                        </div>

                        <div class="block mb-6">
                            <button class="flex items-center justify-center w-full border-0 bg-blue hover:bg-blue-dark text-white rounded py-3" type="submit">
                                <span>{{ __('Sign up') }}</span>
                                <svg class="fill-current w-4 h-4 ml-1">
                                    <use xlink:href="{{ asset('svg/sprite.feathericon.svg#login') }}"></use>
                                </svg>
                            </button>
                        </div>

                        @include('partials.authsocial')

                    </form>
                </div>

				<div class="text-center text-sm text-grey-dark mt-4">
					Have an account? <a class="font-semibold text-grey-darker no-underline hover:underline" href="{{ route('login') }}">Sign in</a>
                </div>
            </div>
        </div>
    </div>
@endsection
