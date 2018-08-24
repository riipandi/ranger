@extends('layouts.app')
@section('title', 'Password Setting')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidemenu')
            <div class="col-md-6">
                @include('layouts.alert')
                <div class="card">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.password') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Old Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="current-password" class="form-control" placeholder="Your current password" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="new-password" class="form-control" placeholder="Type new password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label"></div>
                                <div class="col-sm-9">
                                    <input type="password" name="new-password-c" class="form-control" placeholder="Confirm new password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label"></div>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
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
