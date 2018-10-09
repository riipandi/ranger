<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // $useCaptcha = (app()->environment(['testing', 'production'])) ? 'required|captcha' : '';
        return Validator::make($data, [
            'name'     => 'required|string|max:191',
            'username' => 'required|string|min:4|max:24|alpha_num|unique:users,username',
            'email'    => 'required|string|email|max:191|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            // 'g-recaptcha-response' => $useCaptcha,
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return \App\User
     */
    protected function create(array $data)
    {
        try {
            $user = User::create([
                'username'          => $data['username'],
                'name'              => $data['name'],
                'email'             => $data['email'],
                'password'          => Hash::make($data['password']),
                'remember_token'    => str_random(60),
                'email_verified_at' => null,
                'disabled'          => true,
            ]);
        } catch (\Exception $exception) {
            logger()->error($exception);

            return redirect()->back()->with('warning', __('Unable to create new user!'));
        }

        return $user;
    }

    // dispatch(new SendVerificationEmail($user));
    // dispatch(new SendWelcomeEmail($user));
}
