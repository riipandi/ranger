@extends('layouts.base')

@section('title', 'Users List')

@section('content')
    <div class="w-full flex-grow container mx-auto sm:px-4 pt-6 pb-8">
        <div class="max-w-lg mx-auto">
            @include('partials.alert')
            <div class="w-full">
                <div class="border rounded">
                    <div class="border-b bg-grey-lightest rounded-t text-grey-darker font-semibold px-4 py-3">
                        Users List
                    </div>
                    <div class="bg-white rounded-b p-4">
                        blah
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
