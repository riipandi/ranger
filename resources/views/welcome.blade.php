@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            @include('layouts.alert')
            <div class="jumbotron">
                <div class="card-body text-center mb-0 pb-0">
                    <h2>Welcome, your IP Address is:</h2>
                    <h1 class="mt-4">{{ Request::ip() }}</h1>
                    <a href="{{ route('toolbox.ip') }}" class="btn btn-link mt-4 mb-0">More details &rarr;</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-2">
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="mb-4">DNS Leak Test</h3>
                    <a href="javascript:;" class="btn btn-primary">Leak My DNS</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="mb-4">Whois Lookup</h3>
                    <a href="{{ route('whois.index') }}" class="btn btn-primary">Lookup Domain</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="mb-4">Domain Check</h3>
                    <a href="javascript:;" class="btn btn-primary">Check Domain Availibility</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="mb-4">DNS Record Check</h3>
                    <a href="javascript:;" class="btn btn-primary">Check Record</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="mb-4">String Manipulator</h3>
                    <a href="javascript:;" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="mb-4">RSA Generator</h3>
                    <a href="javascript:;" class="btn btn-primary">Generate RSA Key</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
