@extends('layouts.base')

@section('title', 'DNS Records')

@section('content')
    <div class="w-full flex-grow container mx-auto sm:px-4 pt-6 pb-8">
        @include('partials.alert')

        <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
            <div class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
                <div class="border-b">
                    <div class="flex justify-between px-6 -mb-px">
                        <h3 class="flex text-blue-dark py-4 items-center font-normal text-lg">Add Record</h3>
                        <div class="flex py-4">
                            <a class="no-underline hover:underline cursor-pointer text-grey hover:text-grey-dark text-md">Record Type</a>
                        </div>
                    </div>
                </div>
                <div class="flex-grow flex px-6 py-3 text-grey-darker items-center border-b -mx-4">
                </div>
            </div>
        </div>

        <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
            <div class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
                <div class="border-b">
                    <div class="flex justify-between px-6 -mb-px">
                        <h3 class="flex text-blue-dark py-4 items-center font-normal text-lg">DNS Records</h3>
                        <div class="flex py-4">
                            <form action="{{ route('dns.zones.add') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="flex flex-wrap items-stretch w-full relative">
                                    <input name="domain" placeholder="Enter a domain name" type="text" class="flex-shrink flex-grow flex-auto leading-normal flex-1 relative outline-none text-center text-sm font-light border rounded rounded-r-none focus:border-blue bg-grey-lightest text-grey-darker py-1 pr-9 pl-8">
                                    <div class="flex -mr-px">
                                        <button class="flex items-center leading-normal bg-blue hover:bg-blue-dark text-white py-1 px-3 text-center text-sm font-light border border-blue-dark rounded rounded-l-none focus:outline-none">Add Domain</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="flex-grow flex px-6 py-2 text-grey-darker items-center border-b -mx-4 justify-between">
                    <div class="w-1/4 px-1 flex items-center">
                        <span class="flex-1 relative outline-none text-left text-sm font-semibold text-grey-darker py-2 px-4">Name</span>
                    </div>
                    <div class="w-auto px-1 flex items-center">
                        <span class="flex-1 relative outline-none text-center text-sm font-semibold text-grey-darker py-2 px-4">Type</span>
                    </div>
                    <div class="w-auto px-1 flex items-center">
                        <span class="flex-1 relative outline-none text-center text-sm font-semibold text-grey-darker py-2 px-4">TTL</span>
                    </div>
                    <div class="w-auto px-1 flex items-center">
                        <span class="flex-1 relative outline-none text-center text-sm font-semibold text-grey-darker py-2 px-4">Priority</span>
                    </div>
                    <div class="w-auto text-right">
                        <span class="flex-1 relative outline-none text-center text-sm font-semibold text-grey-darker py-2 px-4">Action</span>
                    </div>
                </div>
                @foreach ($data as $row)
                <div class="flex-grow flex px-6 py-2 text-grey-darker items-center border-b -mx-4 justify-between">
                    <div class="w-1/4 px-1 flex items-center">
                        <input name="domain" value="{{ $row->name }}" type="text" class="flex-1 relative outline-none text-left text-sm font-light text-grey-darker focus:bg-grey-lightest py-2 px-4">
                    </div>
                    <div class="w-auto px-1 flex items-center">
                        <input name="domain" value="{{ $row->type }}" type="text" class="flex-1 relative outline-none text-center text-sm font-light text-grey-darker focus:bg-grey-lightest py-2 px-4">
                    </div>
                    <div class="w-auto px-1 flex items-center">
                        <input name="domain" value="{{ $row->ttl }}" type="text" class="flex-1 relative outline-none text-center text-sm font-light text-grey-darker focus:bg-grey-lightest py-2 px-4">
                    </div>
                    <div class="w-auto px-1 flex items-center">
                        <input name="domain" value="{{ $row->prio }}" type="text" class="flex-1 relative outline-none text-center text-sm font-light text-grey-darker focus:bg-grey-lightest py-2 px-4">
                    </div>
                    <div class="w-auto text-right">
                        <a href="{{ route('dns.records', $row->name) }}" class="flex-inline no-underline items-center justify-center cursor-pointer border-0 bg-grey-darkest hover:bg-green-dark text-white text-sm font-light rounded rounded-r-none py-2 px-2">
                            <svg class="fill-current pt-1 w-4 h-4"><use xlink:href="{{ asset('svg/sprite.feathericon.svg#edit') }}"></use></svg>
                        </a>
                        <a href="{{ route('dns.zones.delete', $row->id) }}" class="flex-inline no-underline items-center justify-center cursor-pointer border-0 bg-grey-darkest hover:bg-red-dark text-white text-sm font-light rounded rounded-l-none py-2 px-2">
                            <svg class="fill-current pt-1 w-4 h-4"><use xlink:href="{{ asset('svg/sprite.feathericon.svg#trash') }}"></use></svg>
                        </a>
                    </div>
                </div>
                @endforeach
                <div class="px-6 py-4">
                    <div class="inline-flex float-right">
                        {{ $data->links() }}
                        {{-- <ul class="flex list-reset border border-grey-light rounded w-auto">
                            <li><a class="block no-underline hover:text-white hover:bg-blue text-blue border-r border-grey-light px-4 py-1 rounded-l" href="#">Previous</a></li>
                            <li><a class="block no-underline hover:text-white hover:bg-blue text-blue border-r border-grey-light px-3 py-1" href="#">1</a></li>
                            <li><a class="block no-underline hover:text-white hover:bg-blue text-blue border-r border-grey-light px-3 py-1" href="#">2</a></li>
                            <li><a class="block no-underline text-white bg-blue border-r border-blue px-3 py-1" href="#">3</a></li>
                            <li><a class="block no-underline hover:text-white hover:bg-blue text-blue px-4 py-1 rounded-r" href="#">Next</a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
