<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = \App\User::where('id', auth()->user()->id)->firstOrFail();
        return view('user.account')->with(compact('user'));
    }

    public function updateSetting(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with(['error' => 'Invalid current password.']);
        }

        $request->validate([
            'current-password' => 'required',
            'username'         => 'required|string|min:4|max:24|max:16|unique:users,username,'.auth()->user()->id,
            'realname'         => 'required|string|max:191',
            'email'            => 'required|string|email|max:191|unique:users,email,'.auth()->user()->id,
        ]);

        $user = Auth::user();
        $user->username = $request->get('username');
        $user->name     = $request->get('realname');
        $user->email    = $request->get('email');
        $user->save();

        return redirect()->back()->with(['success', __('Account updated successfully.')]);
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with(['error' => 'Invalid current password.']);
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with(['warning' => 'Please choose a different password.']);
        }

        $request->validate([
            'current-password' => 'required',
            'new-password'     => 'required|string|min:8',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('new-password'));
        $user->save();

        return redirect()->back()->with(['success' => 'Password changed successfully.']);
    }

    public function destroy(Request $request)
    {
        $del = \App\User::where('id', Auth::user()->id)->delete();

        if ($del) {
            auth()->logout();
            return redirect('login')->with(['success' => 'Your account has been deleted..']);
        } else {
            return redirect()->route('setting.account')
                ->with(['warning', __('Failed to delete your account..')]);
        }
    }
}
