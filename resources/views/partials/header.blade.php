<div id="nav">
    <div class="bg-blue">
        <div class="container mx-auto px-4">
            <div class="flex items-center md:justify-between">
                <div class="w-1/3 md:hidden cursor-pointer">
                    <svg class="fill-current text-white hover:text-grey-lighter h-8 w-8">
                        <use xlink:href="{{ asset('svg/sprite.feathericon.svg#bar') }}"></use>
                    </svg>
                </div>
                <div class="w-1/3 md:w-auto md:flex text-center text-white text-md font-semibold py-3">
                    {{ config('app.name') }}
                </div>
                <div class="w-1/3 md:w-auto flex justify-end">
                    <div class="hidden md:flex items-center justify-center py-3 px-2 bg-blue text-white hover:text-grey-lighter hover:bg-blue-dark cursor-pointer">
                        <a href="javascript:;" class="text-white hover:text-grey-lighter no-underline">
                            <svg class="fill-current h-6 w-6"><use xlink:href="{{ asset('svg/sprite.feathericon.svg#remove-cart') }}"></use></svg>
                        </a>
                    </div>
                    <div class="flex items-center justify-center py-3 px-2 bg-blue text-white hover:text-grey-lighter hover:bg-blue-dark cursor-pointer">
                        <a href="javascript:;" class="text-white hover:text-grey-lighter no-underline">
                            <svg class="fill-current h-6 w-6"><use xlink:href="{{ asset('svg/sprite.feathericon.svg#bell') }}"></use></svg>
                        </a>
                        <sup class="text-xs italic">8</sup>
                    </div>
                    <div class="hidden md:flex items-center justify-center py-3 px-2 text-white hover:text-grey-lighter bg-blue hover:bg-blue-dark cursor-pointer">
                        <a href="javascript:;" class="text-white hover:text-grey-lighter no-underline">
                            <svg class="fill-current h-6 w-6"><use xlink:href="{{ asset('svg/sprite.feathericon.svg#question') }}"></use></svg>
                        </a>
                    </div>
                    <div class="flex items-center justify-center py-3 px-5 cursor-pointer bg-blue hover:bg-blue-dark">
                        <img class="h-8 w-8 rounded-full" src="//avatars0.githubusercontent.com/u/921834?s=128" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden bg-bg-grey-lighter md:block md:border-b">
        <div class="flex container mx-auto px-4">
            <div class="md:flex w-3/4 md:w-3/4">
                <div class="flex -mb-px hover:bg-grey-light px-3 border-b hover:border-blue-dark">
                    <a href="{{ route('dashboard') }}" class="no-underline font-normal text-blue-dark flex hover:opacity-50 items-center py-2">
                        <svg class="h-5 w-5 fill-current mr-2"><use xlink:href="{{ asset('svg/sprite.feathericon.svg#layer') }}"></use></svg>Dashboard
                    </a>
                </div>
                <div class="flex -mb-px hover:bg-grey-light px-3 border-b hover:border-blue-dark">
                    <a href="{{ route('dns.zones.list') }}" class="no-underline font-normal text-blue-dark flex hover:opacity-50 items-center py-2">
                        <svg class="h-5 w-5 fill-current mr-2"><use xlink:href="{{ asset('svg/sprite.feathericon.svg#sitemap') }}"></use></svg>Domain
                    </a>
                </div>
                <div class="flex -mb-px hover:bg-grey-light px-3 border-b hover:border-blue-dark">
                    <a href="{{ route('dashboard') }}" class="no-underline font-normal text-blue-dark flex hover:opacity-50 items-center py-2">
                        <svg class="h-5 w-5 fill-current mr-2"><use xlink:href="{{ asset('svg/sprite.feathericon.svg#folder') }}"></use></svg>FTP Users
                    </a>
                </div>
                @if (auth()->user()->id == 1)
                <div class="flex -mb-px hover:bg-grey-light px-3 border-b hover:border-blue-dark">
                    <a href="{{ route('user.list') }}" class="no-underline font-normal text-blue-dark flex hover:opacity-50 items-center py-2">
                        <svg class="h-5 w-5 fill-current mr-2"><use xlink:href="{{ asset('svg/sprite.feathericon.svg#users') }}"></use></svg>Users
                    </a>
                </div>
                <div class="flex -mb-px hover:bg-grey-light px-3 border-b hover:border-blue-dark">
                    <a href="{{ route('setting.general') }}" class="no-underline font-normal text-blue-dark flex hover:opacity-50 items-center py-2">
                        <svg class="h-5 w-5 fill-current mr-2"><use xlink:href="{{ asset('svg/sprite.feathericon.svg#gear') }}"></use></svg>Settings
                    </a>
                </div>
                @endif
            </div>
            <div class="md:flex w-1/4 md:w-1/4 justify-end">
                @auth
                <div class="flex -mb-px hover:bg-grey-light px-3 border-b hover:border-blue-dark">
                    <a href="{{ route('user.account') }}" class="no-underline font-normal text-blue-dark flex hover:opacity-50 items-center py-2">
                    <svg class="h-5 w-5 fill-current mr-2"><use xlink:href="{{ asset('svg/sprite.feathericon.svg#user') }}"></use></svg>Accounts
                    </a>
                </div>
                <div class="flex -mb-px hover:bg-grey-light px-3 border-b hover:border-blue-dark">
                    <a href="{{ route('logout') }}" class="no-underline font-normal text-blue-dark flex hover:opacity-50 items-center py-2">
                        Sign Out<svg class="h-5 w-5 fill-current ml-2"><use xlink:href="{{ asset('svg/sprite.feathericon.svg#logout') }}"></use></svg>
                    </a>
                </div>
                @else
                <div class="flex -mb-px hover:bg-grey-light px-3 border-b hover:border-blue-dark">
                    <a href="{{ route('register') }}" class="no-underline font-normal text-blue-dark flex hover:opacity-50 items-center py-2">
                        Sign Up<svg class="h-5 w-5 fill-current ml-2"><use xlink:href="{{ asset('svg/sprite.feathericon.svg#logout') }}"></use></svg>
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>
