<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

use App;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        $identity = request()->get('identity');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldName => $identity]);
        return $fieldName;
    }

    protected function validateInput(Request $request)
    {
        $this->validate(
            $request,
            [
                'identity' => 'required|string',
                'password' => 'required|string',
            ],
            [
                'identity.required' => trans('validation.required'),
                'password.required' => trans('validation.required'),
            ]
        );
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $message = __('Invalid credentials');
        $request->session()->flash('warning', $message);
        throw ValidationException::withMessages(['error' => [$message]]);
    }

    public function login(Request $request)
    {
        $this->validateInput($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();

            if (($user->disabled == false) && $this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            } else {
                $this->incrementLoginAttempts($request);
                alert()->warning(__('User inactive or not verified!'), 'Warning')->autoclose(2400);
                return redirect()->back()->withInput($request->only($this->username(), 'remember'));
            }
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        // $this->logActivity('Logout');
        auth()->logout();
        alert()->success('See you next time!', 'Log Out')->autoclose(2400);
        return redirect('login');
    }

    protected function authenticated(Request $request, $user)
    {
        alert()->success('Welcome ' . auth()->user()->realname, 'Good job!')->autoclose(2400);
        redirect('dashboard');
    }

    protected function logActivity(Request $request, $message)
    {
        // activity()
        //     ->causedBy($user->id)
        //     ->withProperties(['ip_address' => $request->getClientIp()])
        //     ->log($message);
    }
}
