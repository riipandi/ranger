@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            {{-- @include('layouts.sidemenu') --}}
            <div class="col-md-12">
                @include('layouts.alert')
                <div class="card">
                    {{-- <div class="card-header">Welcome</div> --}}
                    <div class="card-body mt-3">
                        <form method="POST" action="{{ url('whois') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label text-center">{{ __('Domain') }}</label>
                                <div class="col-md-7">
                                    <input id="domain" type="domain" class="form-control{{ $errors->has('domain') ? ' is-invalid' : '' }}" name="domain" value="{{ old('domain') }}" required autofocus>
                                    @if ($errors->has('domain'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('domain') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-block btn-primary">{{ __('Lookup') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
