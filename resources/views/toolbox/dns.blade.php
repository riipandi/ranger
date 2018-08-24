@extends('layouts.app')
@section('title', 'What Is My IP Address')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidefront')
            <div class="col-md-9">
                @include('layouts.alert')
                <div class="card">
                    <div class="card-header">What is my IP address?</div>
                    <div class="card-body">
                        @if (isset($output))
                            {{ $output }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
