@if (option('enable_social_auth') == 'true')
    <div class="hr-text" data-content="{{ __('or sign in with') }}"></div>

    <div class="flex flex-wrap -mx-2 mb-2 mt-4">
        @if (option('enable_auth_google') == 'true')
        <div class="flex-1 sm:w-1/2 px-2 mb-3 sm:mb-3">
            <a href="{{ url('auth/google') }}" class="text-red hover:text-red-dark py-2 px-4 no-underline bg-white hover:bg-grey-lightest shadow border border-grey-light text-sm font-semibold rounded w-full flex items-center justify-center">
                <svg class="fill-current w-4 h-4 mr-1">
                    <use xlink:href="{{ asset('svg/sprite.feathericon.svg#google') }}"></use>
                </svg>
                <span>Google</span>
            </a>
        </div>
        @endif

        @if (option('enable_auth_facebook') == 'true')
        <div class="flex-1 sm:w-1/2 px-2 mb-3 sm:mb-3">
            <a href="{{ url('auth/facebook') }}" class="text-blue-dark hover:text-blue-darkest py-2 px-4 no-underline bg-white hover:bg-grey-lightest shadow border border-grey-light text-sm font-semibold rounded w-full flex items-center justify-center">
                <svg class="fill-current w-4 h-4 mr-1">
                    <use xlink:href="{{ asset('svg/sprite.feathericon.svg#facebook') }}"></use>
                </svg>
                <span>Facebook</span>
            </a>
        </div>
        @endif

        @if (option('enable_auth_twitter') == 'true')
        <div class="flex-1 sm:w-1/2 px-2 mb-3 sm:mb-3">
            <a href="{{ url('auth/twitter') }}" class="text-blue hover:text-blue-dark py-2 px-4 no-underline bg-white hover:bg-grey-lightest shadow border border-grey-light text-sm font-semibold rounded w-full flex items-center justify-center">
                <svg class="fill-current w-4 h-4 mr-1">
                    <use xlink:href="{{ asset('svg/sprite.feathericon.svg#twitter') }}"></use>
                </svg>
                <span>Twitter</span>
            </a>
        </div>
        @endif

        @if (option('enable_auth_github') == 'true')
        <div class="flex-1 sm:w-1/2 px-2 mb-3 sm:mb-3">
            <a href="{{ url('auth/github') }}" class="text-grey-darker hover:text-grey-darkest py-2 px-4 no-underline bg-white hover:bg-grey-lightest shadow border border-grey-light text-sm font-semibold rounded w-full flex items-center justify-center">
                <svg class="fill-current w-4 h-4 mr-1">
                    <use xlink:href="{{ asset('svg/sprite.feathericon.svg#github') }}"></use>
                </svg>
                <span>Github</span>
            </a>
        </div>
        @endif
    </div>
@endif
