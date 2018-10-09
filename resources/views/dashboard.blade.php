@extends('layouts.base')

@section('title', 'Dashboard')

@section('content')
{{--
    <div class="w-full flex-grow container mx-auto sm:px-4 pt-6 pb-8">
        <div class="max-w-lg mx-auto">
            @include('partials.alert')
            <dashboard-component title="Dashboard">
                You are signed in!
            </dashboard-component>
        </div>
    </div>
--}}
    <div class="flex-grow container mx-auto sm:px-4 pt-6 pb-8">
        
        @include('partials.alert')
        
        <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
            <div class="border-b px-6">
                <div class="flex justify-between -mb-px">
                    <div class="lg:hidden text-blue-dark py-4 text-lg">
                        Price Charts
                    </div>
                    <div class="hidden lg:flex">
                        <button type="button" class="appearance-none py-4 text-blue-dark border-b border-blue-dark mr-6 focus:outline-none">Bitcoin &middot; CA$21,404.74</button>
                        <button type="button" class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark mr-6 focus:outline-none">Ethereum &middot; CA$884.80</button>
                        <button type="button" class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark focus:outline-none">Litecoin &middot; CA$358.24</button>
                    </div>
                    <div class="flex text-sm">
                        <button type="button" class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark mr-3 focus:outline-none">1M</button>
                        <button type="button" class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark mr-3 focus:outline-none">1D</button>
                        <button type="button" class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark mr-3 focus:outline-none">1W</button>
                        <button type="button" class="appearance-none py-4 text-blue-dark border-b border-blue-dark mr-3">1M</button>
                        <button type="button" class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark mr-3 focus:outline-none">1Y</button>
                        <button type="button" class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark focus:outline-none">ALL</button>
                    </div>
                </div>
            </div>
            <div class="flex items-center px-6 lg:hidden">
                <div class="flex-grow flex-no-shrink py-6">
                <div class="text-grey-darker mb-2">
                    <span class="text-3xl align-top">CA$</span>
                    <span class="text-5xl">21,404</span>
                    <span class="text-3xl align-top">.74</span>
                </div>
                <div class="text-green-light text-sm">
                    &uarr; CA$12,955.35 (154.16%)
                </div>
                </div>
                <div class="flex-shrink w-32 inline-block relative">
                <select class="block appearance-none w-full bg-white border border-grey-light px-4 py-2 pr-8 rounded">
					<option>BTC</option>
					<option>ETH</option>
					<option>LTC</option>
				</select>
                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
                </div>
            </div>
            <div class="hidden lg:flex">
                <div class="w-1/3 text-center py-8">
                <div class="border-r">
                    <div class="text-grey-darker mb-2">
                    <span class="text-3xl align-top">CA$</span>
                    <span class="text-5xl">21,404</span>
                    <span class="text-3xl align-top">.74</span>
                    </div>
                    <div class="text-sm uppercase text-grey tracking-wide">
                    Bitcoin Price
                    </div>
                </div>
                </div>
                <div class="w-1/3 text-center py-8">
                <div class="border-r">
                    <div class="text-grey-darker mb-2">
                    <span class="text-3xl align-top"><span class="text-green align-top">+</span>CA$</span>
                    <span class="text-5xl">12,998</span>
                    <span class="text-3xl align-top">.48</span>
                    </div>
                    <div class="text-sm uppercase text-grey tracking-wide">
                    Since last month (CAD)
                    </div>
                </div>
                </div>
                <div class="w-1/3 text-center py-8">
                <div>
                    <div class="text-grey-darker mb-2">
                    <span class="text-3xl align-top"><span class="text-green align-top">+</span></span>
                    <span class="text-5xl">154.47</span>
                    <span class="text-3xl align-top">%</span>
                    </div>
                    <div class="text-sm uppercase text-grey tracking-wide">
                    Since last month (%)
                    </div>
                </div>
                </div>
            </div>
        </div>
        
        <div class="flex flex-wrap -mx-4">
            <div class="w-full mb-6 lg:mb-0 lg:w-1/2 px-4 flex flex-col">
                <div class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
                    <div class="border-b">
                        <div class="flex justify-between px-6 -mb-px">
                            <h3 class="flex text-blue-dark py-4 items-center font-normal text-lg">Your Domains</h3>
                            <div class="flex py-4">
                                <button type="button" class="bg-blue hover:bg-blue-dark text-white text-xs border border-blue-dark rounded px-4 py-2">Add Domain</button>
                            </div>
                        </div>
                    </div>
                    @for ($i = 1; $i <= 5; $i++)
                    <div class="flex-grow flex px-6 py-2 text-grey-darker items-center border-b -mx-4">
                        <div class="w-1/2 px-4 flex items-center">
                            <div class="bg-green h-2 w-2 rounded-full mr-3"></div>
                            <a href="javascript:;" class="text-grey-darker no-underline hover:underline">domain.com</a>
                        </div>
                        <div class="w-1/4 text-left text-grey italic">50 records</div>
                        <div class="w-1/4 text-right text-grey text-sm italic mr-3">Exp: 31/12/2018</div>
                    </div>
                    @endfor
                    <div class="px-6 py-4">
                        <div class="text-center">
                            <a href="javascript:;" class="text-grey no-underline hover:underline">Manage all domains &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 px-4">
                <div class="bg-white border-t border-b sm:rounded sm:border shadow">
                <div class="border-b">
                    <div class="flex justify-between px-6 -mb-px">
                    <h3 class="text-blue-dark py-4 font-normal text-lg">Recent Activity</h3>
                    </div>
                </div>
                <div>
                    <div class="text-center px-6 py-4">
                    <div class="py-8">
                        <div class="mb-4">
                        <svg class="inline-block fill-current text-grey h-16 w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11.933 13.069s7.059-5.094 6.276-10.924a.465.465 0 0 0-.112-.268.436.436 0 0 0-.263-.115C12.137.961 7.16 8.184 7.16 8.184c-4.318-.517-4.004.344-5.974 5.076-.377.902.234 1.213.904.959l2.148-.811 2.59 2.648-.793 2.199c-.248.686.055 1.311.938.926 4.624-2.016 5.466-1.694 4.96-6.112zm1.009-5.916a1.594 1.594 0 0 1 0-2.217 1.509 1.509 0 0 1 2.166 0 1.594 1.594 0 0 1 0 2.217 1.509 1.509 0 0 1-2.166 0z"/></svg>
                        </div>
                        <p class="text-2xl text-grey-darker font-medium mb-4">No buys or sells yet</p>
                        <p class="text-grey max-w-xs mx-auto mb-6">You've successfully linked a payment method and can start buying digital currency.</p>
                        <div>
                        <button type="button" class="bg-blue hover:bg-blue-dark text-white border border-blue-dark rounded px-6 py-4">Buy now</button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
