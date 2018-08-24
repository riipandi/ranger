@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidemenu')
            <div class="col-md-9">
                @include('layouts.alert')
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        Selamat datang {{ Auth::user()->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
