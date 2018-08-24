@extends('layouts.app')
@section('title', 'My IP')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidefront')
            <div class="col-md-9">
                @include('layouts.alert')
                <div class="card">
                    <div class="card-header">Welcome</div>
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
