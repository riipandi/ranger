<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        if (!auth()->check()) {
            return redirect('login')->with(['warning' => 'You have not logged in before!']);
        }
        auth()->logout();

        return redirect('login')->with(['success' => 'See you next time..']);
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
        // $useCaptcha = (app()->environment(['testing', 'production'])) ? 'required|captcha' : null;
        $this->validate(
            $request,
            [
                'identity' => 'required|string',
                'password' => 'required|string',
                // 'g-recaptcha-response' => $useCaptcha,
            ],
            [
                'identity.required' => __('validation.required'),
                'password.required' => __('validation.required'),
                // 'g-recaptcha-response.required' => 'Please make sure that you are not robot!',
            ]
        );
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $request->session()->flash('error', __('Invalid credentials!'));
        throw ValidationException::withMessages([
            // 'identity' => ['This user not found!'],
            // 'password' => ['Check your password!'],
        ]);
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
                $request->session()->flash('warning', __('User inactive or not yet verified!'));
                return redirect()->back()->withInput($request->only($this->username(), 'remember'));
            }
        }
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect('dashboard')->with(['success' => 'Welcome home '.auth()->user()->name]);
    }
}
