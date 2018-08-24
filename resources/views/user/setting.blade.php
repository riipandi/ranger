@extends('layouts.app')
@section('title', 'Account Setting')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidemenu')
            <div class="col-md-6">
                @include('layouts.alert')
                <div class="card">
                    <div class="card-header">Account Setting</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.setting') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Username</label>
                                <div class="col-sm-8">
                                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" {{ (1 == $user->id) ? 'readonly' : ''}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Real Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="realname" class="form-control" value="{{ $user->realname }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Email Address</label>
                                <div class="col-sm-8">
                                    <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Current Password</label>
                                <div class="col-sm-8">
                                    <input type="password" name="current-password" class="form-control" placeholder="Your current password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 col-form-label"></div>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary">Update Setting</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

@endsection
