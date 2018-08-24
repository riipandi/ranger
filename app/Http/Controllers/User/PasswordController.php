<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use App\User;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('user.password');
    }

    public function save(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with(['danger' => 'Invalid current password!']);
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with(['warning' => 'Please choose a different password!']);
        }

        if($request->get('new-password') != $request->get('new-password-c')) {
            return redirect()->back()->with(['warning' => 'Password confirmation not match!']);
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6',
            'new-password-c' => 'required|string',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('new-password'));
        $user->save();

        return redirect()->back()->with(['success' => 'Password changed successfully!']);
    }
}
