<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

Use App\User;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        return view('user.setting')->with('user', $user);
    }

    public function save(Request $request) {
        if (!(Hash::check($request->get('current-password'), auth()->user()->password))) {
            return redirect()->back()->with(['danger' => 'Invalid current password!']);
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'username' => 'required|string|min:4|max:16|unique:users,username,'.auth()->user()->id,
            'realname' => 'required|string|max:191',
            'email'    => 'required|string|email|max:191|unique:users,email,'.auth()->user()->id,
        ]);

        $user = Auth::user();
        $user->username = $request->get('username');
        $user->realname = $request->get('realname');
        $user->email    = $request->get('email');
        $user->save();

        return redirect()->back()->with(['success' => 'Account updated successfully!']);
    }
}
