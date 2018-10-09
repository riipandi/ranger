@extends('layouts.base')

@section('title', 'Account Setting')

@section('content')
    <div class="w-full flex-grow container mx-auto sm:px-4 pt-6 pb-8">
        <div class="max-w-lg mx-auto">

            @include('partials.alert')

            <div class="w-full">

                {{-- Account Setting --}}
                <div class="border rounded mb-6">
                    <div class="border-b bg-grey-lightest rounded-t text-grey-darker font-semibold px-4 py-3">{{ __('Account') }}</div>
                    <div class="bg-white rounded-b p-4">
                        <form action="{{ route('setting.account') }}" method="POST" class="w-full max-w-md">
                            @csrf
                            <div class="md:flex md:items-center mb-4">
                                <div class="md:w-1/3">
                                    <label for="realname" class="block text-grey font-semibold md:text-right mb-1 md:mb-0 pr-4">{{ __('Real Name') }}</label>
                                </div>
                                <div class="md:w-2/3">
                                    <input value="{{ $errors->has('realname') ? old('realname') : Auth::user()->name }}" name="realname" id="realname" class="bg-grey-lighter appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-blue-light" type="text">
                                </div>
                            </div>
                            <div class="md:flex md:items-center mb-4">
                                <div class="md:w-1/3">
                                    <label for="email" class="block text-grey font-semibold md:text-right mb-1 md:mb-0 pr-4">{{ __('Email Address') }}</label>
                                </div>
                                <div class="md:w-2/3">
                                    <input value="{{ Auth::user()->email }}" name="email" id="email" class="bg-grey-lighter appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-blue-light" type="text">
                                </div>
                            </div>

                            <div class="md:flex md:items-center mb-4">
                                <div class="md:w-1/3">
                                    <label for="username" class="block text-grey font-semibold md:text-right mb-1 md:mb-0 pr-4">{{ __('Username') }}</label>
                                </div>
                                <div class="md:w-2/3">
                                    <input value="{{ Auth::user()->username }}" name="username" id="username" class="bg-grey-lighter appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-blue-light @if (Auth::user()->id == 1){{ 'cursor-not-allowed' }}@endif" type="text" @if (Auth::user()->id == 1){{ 'readonly' }}@endif>
                                </div>
                            </div>

                            <div class="md:flex md:items-center mb-4">
                                <div class="md:w-1/3">
                                    <label for="current-password-account" class="block text-grey font-semibold md:text-right mb-1 md:mb-0 pr-4">{{ __('Current Password') }}</label>
                                </div>
                                <div class="md:w-2/3">
                                    <div class="relative">
                                        <input id="current-password-account" name="current-password" class="py-2 pl-4 pr-32 bg-grey-lighter appearance-none border-2 border-grey-lighter rounded w-full text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-blue-light" type="password" placeholder="**********************" required>
                                        <span class="absolute pin-y pin-r px-3 flex items-center font-light">
                                            <a class="text-sm inline-block text-grey text-xs no-underline hover:underline" href="{{ route('password.request') }}">Forgot Password?</a>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="md:flex md:items-center">
                                <div class="md:w-1/3"></div>
                                <div class="md:w-1/5">
                                    <button class="flex items-center justify-center border-0 w-full px-6 py-3 bg-green hover:bg-green-dark text-white rounded" type="submit">
                                        <svg class="fill-current w-4 h-4 mr-1">
                                            <use xlink:href="{{ asset('svg/sprite.feathericon.svg#check') }}"></use>
                                        </svg>
                                        <span>{{ __('Save') }}</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Password Setting --}}
                <div class="border rounded mb-6">
                    <div class="border-b bg-grey-lightest rounded-t text-grey-darker font-semibold px-4 py-3">{{ __('Password') }}</div>
                    <div class="bg-white rounded-b p-4">
                        <form action="{{ route('setting.password') }}" method="POST" class="w-full max-w-md">
                            @csrf
                            <div class="md:flex md:items-center mb-4">
                                <div class="md:w-1/3">
                                    <label for="current-password" class="block text-grey font-semibold md:text-right mb-1 md:mb-0 pr-4">{{ __('Current Pasword') }}</label>
                                </div>
                                <div class="md:w-2/3">
                                    <div class="relative">
                                        <input id="current-password" name="current-password" class="bg-grey-lighter appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-blue-light" type="password" required>
                                        <span class="absolute pin-y pin-r px-3 flex items-center text-grey" title="{{ __('Show / hide password') }}">
                                            <svg @click="switchVisibility('current-password')" class="fill-current w-4 h-4 cursor-pointer">
                                                <use xlink:href="{{ asset('svg/sprite.feathericon.svg#eye') }}"></use>
                                                <title>{{ __('Show / hide password') }}</title>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:flex md:items-center mb-4">
                                <div class="md:w-1/3">
                                    <label for="new-password" class="block text-grey font-semibold md:text-right mb-1 md:mb-0 pr-4">{{ __('New Password') }}</label>
                                </div>
                                <div class="md:w-2/3">
                                    <div class="relative">
                                        <input id="new-password" name="new-password" class="bg-grey-lighter appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-blue-light" type="password" required>
                                        <span class="absolute pin-y pin-r px-3 flex items-center text-grey" title="{{ __('Show / hide password') }}">
                                            <svg @click="switchVisibility('new-password')" class="fill-current w-4 h-4 cursor-pointer">
                                                <use xlink:href="{{ asset('svg/sprite.feathericon.svg#eye') }}"></use>
                                                <title>{{ __('Show / hide password') }}</title>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:flex md:items-center">
                                <div class="md:w-1/3"></div>
                                <div class="md:w-2/3">
                                    <button class="flex items-center justify-center border-0 w-auto px-6 py-3 bg-green hover:bg-green-dark text-white rounded" type="submit">
                                        <svg class="fill-current w-4 h-4 mr-1">
                                            <use xlink:href="{{ asset('svg/sprite.feathericon.svg#check') }}"></use>
                                        </svg>
                                        <span>{{ __('Update Password') }}</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Social Accounts --}}
                @if (option('enable_social_auth') == 'true')
                <div class="border rounded mb-6">
                    <div class="border-b bg-grey-lightest rounded-t text-grey-darker font-semibold px-4 py-3">{{ __('Connected Account') }}</div>
                    <div class="bg-white rounded-b p-4">
                        <div class="flex flex-wrap -mx-2 mb-2 mt-4">
                            @if (option('enable_auth_google') == 'true')
                                @if ($user->provider_name == 'google')
                                <div class="flex-1 sm:w-full px-2 mb-3 sm:mb-3">
                                    <a href="{{ url('disconnect/google') }}" title="Click to disconnect" class="opacity-50 text-grey-darker hover:text-red py-2 px-4 no-underline bg-white hover:bg-grey-lightest shadow border border-grey-light text-sm font-semibold rounded w-full flex items-center justify-center">
                                        <svg class="fill-current w-4 h-4 mr-1">
                                            <use xlink:href="{{ asset('svg/sprite.feathericon.svg#google') }}"></use>
                                        </svg>
                                        <span>Connected</span>
                                    </a>
                                </div>
                                @else
                                <div class="flex-1 sm:w-full px-2 mb-3 sm:mb-3">
                                    <a href="{{ url('auth/google') }}" title="Click to connect" class="text-grey-darker hover:text-red py-2 px-4 no-underline bg-white hover:bg-grey-lightest shadow border border-grey-light text-sm font-semibold rounded w-full flex items-center justify-center">
                                        <svg class="fill-current w-4 h-4 mr-1">
                                            <use xlink:href="{{ asset('svg/sprite.feathericon.svg#google') }}"></use>
                                        </svg>
                                        <span>Not Connected</span>
                                    </a>
                                </div>
                                @endif
                            @endif

                            @if (option('enable_auth_facebook') == 'true')
                                @if ($user->provider_name == 'facebook')
                                <div class="flex-1 sm:w-full px-2 mb-3 sm:mb-3">
                                    <a href="{{ url('disconnect/facebook') }}" title="Click to disconnect" class="opacity-50 text-grey-darker hover:text-blue-darkest py-2 px-4 no-underline bg-white hover:bg-grey-lightest shadow border border-grey-light text-sm font-semibold rounded w-full flex items-center justify-center">
                                        <svg class="fill-current w-4 h-4 mr-1">
                                            <use xlink:href="{{ asset('svg/sprite.feathericon.svg#facebook') }}"></use>
                                        </svg>
                                        <span>Connected</span>
                                    </a>
                                </div>
                                @else
                                <div class="flex-1 sm:w-full px-2 mb-3 sm:mb-3">
                                    <a href="{{ url('auth/facebook') }}" title="Click to connect" class="text-grey-darker hover:text-blue-dark py-2 px-4 no-underline bg-white hover:bg-grey-lightest shadow border border-grey-light text-sm font-semibold rounded w-full flex items-center justify-center">
                                        <svg class="fill-current w-4 h-4 mr-1">
                                            <use xlink:href="{{ asset('svg/sprite.feathericon.svg#facebook') }}"></use>
                                        </svg>
                                        <span>Not Connected</span>
                                    </a>
                                </div>
                                @endif
                            @endif

                            @if (option('enable_auth_twitter') == 'true')
                                @if ($user->provider_name == 'twitter')
                                <div class="flex-1 sm:w-full px-2 mb-3 sm:mb-3">
                                    <a href="{{ url('disconnect/twitter') }}" title="Click to disconnect" class="opacity-50 text-grey-darker hover:text-blue py-2 px-4 no-underline bg-white hover:bg-grey-lightest shadow border border-grey-light text-sm font-semibold rounded w-full flex items-center justify-center">
                                        <svg class="fill-current w-4 h-4 mr-1">
                                            <use xlink:href="{{ asset('svg/sprite.feathericon.svg#twitter') }}"></use>
                                        </svg>
                                        <span>Connected</span>
                                    </a>
                                </div>
                                @else
                                <div class="flex-1 sm:w-full px-2 mb-3 sm:mb-3">
                                    <a href="{{ url('auth/twitter') }}" title="Click to connect" class="text-grey-darker hover:text-blue py-2 px-4 no-underline bg-white hover:bg-grey-lightest shadow border border-grey-light text-sm font-semibold rounded w-full flex items-center justify-center">
                                        <svg class="fill-current w-4 h-4 mr-1">
                                            <use xlink:href="{{ asset('svg/sprite.feathericon.svg#twitter') }}"></use>
                                        </svg>
                                        <span>Not Connected</span>
                                    </a>
                                </div>
                                @endif
                            @endif
    
                            @if (option('enable_auth_github') == 'true')
                                @if ($user->provider_name == 'github')
                                <div class="flex-1 sm:w-full px-2 mb-3 sm:mb-3">
                                    <a href="{{ url('disconnect/github') }}" title="Click to disconnect" class="opacity-50 text-grey-darker hover:text-grey-darkest py-2 px-4 no-underline bg-white hover:bg-grey-lightest shadow border border-grey-light text-sm font-semibold rounded w-full flex items-center justify-center">
                                        <svg class="fill-current w-4 h-4 mr-1">
                                            <use xlink:href="{{ asset('svg/sprite.feathericon.svg#github') }}"></use>
                                        </svg>
                                        <span>Connected</span>
                                    </a>
                                </div>
                                @else
                                <div class="flex-1 sm:w-full px-2 mb-3 sm:mb-3">
                                    <a href="{{ url('auth/github') }}" title="Click to connect" class="text-grey-darker hover:text-grey-darkest py-2 px-4 no-underline bg-white hover:bg-grey-lightest shadow border border-grey-light text-sm font-semibold rounded w-full flex items-center justify-center">
                                        <svg class="fill-current w-4 h-4 mr-1">
                                            <use xlink:href="{{ asset('svg/sprite.feathericon.svg#github') }}"></use>
                                        </svg>
                                        <span>Not Connected</span>
                                    </a>
                                </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                {{-- 2FA Setting --}}
                @if (option('enable_user_2factor') == 'true')
                <div class="border rounded mb-6">
                    <div class="border-b bg-grey-lightest rounded-t text-grey-darker font-semibold px-4 py-3">{{ __('Two Factor Authentication') }}</div>
                    <div class="bg-white rounded-b p-4">
                        <alert-component type="Info" clsbtn="false">
                            To utilize two factor authentication, you must install the
                            <a class="no-underline hover:underline" href="//support.google.com/accounts/answer/1066447">Google Authenticator</a>
                            application on your smartphone.
                        </alert-component>
                        <div class="md:w-2/3">
                            <button class="bg-blue hover:bg-blue-dark text-white flex items-center justify-center border-0 w-auto px-6 py-3 rounded" type="submit">
                                <svg class="fill-current w-4 h-4 mr-1">
                                    <use xlink:href="{{ asset('svg/sprite.feathericon.svg#phone') }}"></use>
                                </svg>
                                <span>{{ __('Enable Authentication') }}</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Danger Zone --}}
                @if (Auth::user()->id != 1)
                <div class="border rounded mb-6">
                    <div class="border-b bg-grey-lightest rounded-t text-grey-darker font-semibold px-4 py-3">{{ __('Danger Zone') }}</div>
                    <div class="bg-white rounded-b p-4">
                        <alert-component type="Error" clsbtn="false">
                            This action is not reversible. Your account information will be deleted immediately.
                        </alert-component>
                        <div class="md:w-1/3">
                            <a href="{{ route('user.destroy') }}" class="no-underline bg-red hover:bg-red-dark text-white flex items-center justify-center border-0 w-auto px-6 py-3 rounded">
                                <svg class="fill-current w-4 h-4 mr-1">
                                    <use xlink:href="{{ asset('svg/sprite.feathericon.svg#trash') }}"></use>
                                </svg>
                                <span>{{ __('Delete Account') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
@endsection
