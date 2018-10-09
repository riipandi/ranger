@extends('layouts.auth')
@section('title', 'Sign in')

@section('content')
    <div class="min-h-full h-full bg-grey-lightest flex flex-col items-center overflow-auto">
        <div class="m-auto max-w-sm w-full sm:px-8">
            <div class="m-8">
                <div class="text-xl text-center mb-6">
                    <a class="text-grey-darker hover:text-grey-darkest no-underline" href="/">{{ config('app.name') }}</a>
                </div>

                @include('partials.alert')

                <div class="bg-white rounded">
                    <div class="block rounded-t w-full h-2 bg-blue"></div>

                    <form class="w-full border border-t-0 rounded-b p-8" action="{{ route('login') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="text-lg text-grey-darkest text-center mb-6">Sign in to your account</div>

                        <div class="block mb-4">
                            <div class="relative">
                                <input autofocus required type="text" name="identity" placeholder="Email or username" value="{{ old('identity') }}" class="block appearance-none outline-none w-full h-full border focus:border-blue bg-grey-lightest text-grey-darker py-3 pr-9 pl-4 rounded{{ $errors->first('identity', ' border-red') }}" />
                                <div class="absolute pin-y pin-r flex items-center text-grey pointer-events-none px-3">
                                    <svg class="fill-current w-4 h-4">
                                        <use xlink:href="{{ asset('svg/sprite.feathericon.svg#mail') }}"></use>
                                    </svg>
                                </div>
                            </div>
                            @if ($errors->has('identity'))<div class="mt-2 text-sm font-semibold text-red-light">{{ $errors->first('identity') }}</div>@endif
                        </div>

                        <div class="block mb-4">
                            <div class="relative">
                                <input required id="password" type="password" name="password" placeholder="Password" class="block appearance-none outline-none w-full h-full border focus:border-blue bg-grey-lightest text-grey-darker py-3 pr-9 pl-4 rounded{{ $errors->first('password', ' border-red') }}" />
								<span class="absolute pin-y pin-r px-3 flex items-center text-grey" title="{{ __('Show / hide password') }}">
									<svg @click="switchVisibility('password')" class="fill-current w-4 h-4 cursor-pointer">
                                        <use xlink:href="{{ asset('svg/sprite.feathericon.svg#eye') }}"></use>
                                        <title>{{ __('Show / hide password') }}</title>
                                    </svg>
								</span>
                            </div>
                            @if ($errors->has('password'))<div class="mt-2 text-sm font-semibold text-red-light">{{ $errors->first('password') }}</div>@endif
                        </div>

                        <div class="flex items-center justify-between mb-4">
                            <label class="flex items-center select-none cursor-pointer" for="remember">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                <span class="text-sm ml-2">Remember me</span>
                            </label>
							<a class="text-sm inline-block float-right text-grey-darker no-underline hover:underline" href="{{ route('password.request') }}">Forgot password?</a>
                        </div>

                        <div class="block mb-6">
                            <button class="flex items-center justify-center w-full border-0 bg-blue hover:bg-blue-dark text-white rounded py-3" type="submit">
                                <span>{{ __('Sign in') }}</span>
                                <svg class="fill-current w-4 h-4 ml-1">
                                    <use xlink:href="{{ asset('svg/sprite.feathericon.svg#login') }}"></use>
                                </svg>
                            </button>
                        </div>

                        @include('partials.authsocial')

                    </form>
                </div>

				<div class="text-center text-sm text-grey-dark mt-4">
					Don't have an account? <a class="font-semibold text-grey-darker no-underline hover:underline" href="{{ route('register') }}">Sign up</a>
                </div>

            </div>
        </div>
    </div>
@endsection
