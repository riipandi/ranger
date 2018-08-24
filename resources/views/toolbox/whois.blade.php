@extends('layouts.app')
@section('title', 'Whois')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidefront')
            <div class="col-md-9">
                @include('layouts.alert')
                <div class="card">
                    <div class="card-header">Welcome</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('whois') }}">
                            @csrf
<div class="form-row">
<div class="form-group col-md-8">
<input type="text" class="form-control" name="domain" value="{{ old('domain') }}" placeholder="Enter domain name" required>
</div>
<div class="form-group col-md-4">
<button type="submit" class="btn btn-block btn-primary">{{ __('Lookup') }}</button>
</div>
</div>
                        </form>
                    </div>

                    @if (isset($error))
                    <div class="card-footer">
                        <pre>{{ $error }}</pre>
                    </div>
                    @endif

                    @if (isset($info))
                    <div class="card-footer">
                        <pre>{{ $info->getText() }}</pre>
                    </div>
                    @elseif (isset($infoFromCache))
                    <div class="card-footer">
                        <pre>{{ $infoFromCache->result }}</pre>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
