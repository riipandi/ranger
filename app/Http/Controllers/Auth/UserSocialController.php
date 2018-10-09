<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\UserSocialAccount;
use App\User;

class UserSocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'redirectToProvider',
            'handleProviderCallback',
            'unavailable',
        ]]);
    }

    /**
     * Redirect the user to the authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        if (option('enable_auth_'. $provider) != 'true') {
            return static::unavailable($provider);
        }

        // Dynamic configuration from database
        $this->setConfig($provider);

        try {
            switch ($provider) {
                case 'google':
                    $scopes = ['openid', 'profile', 'email'];
                    break;
                case 'twitter':
                    return \Socialite::with($provider)->redirect();
                    break;
                case 'facebook':
                    $scopes = ['email', 'user_age_range', 'user_birthday', 'user_hometown', 'user_gender',];
                    break;
                case 'github':
                    $scopes = ['read:user', 'notifications'];
                    break;
                default:
                    return static::unavailable($provider);
                    break;
            }
        } catch (\Exception $e) {
            if (app()->environment(['local', 'testing'])) {
                $message = 'Something wrong: '.$e;
            } else {
                $message = 'Something wrong. Contact sysadmin!';
            }
            return redirect('login')->with(['error' => $message]);
        }

        return \Socialite::with($provider)->scopes($scopes)->redirect();
    }

    /**
     * Obtain the user information.
     *
     * @return Response
     */
    public function handleProviderCallback(\App\UserSocialService $accountService, $provider)
    {
        // Dynamic configuration from database
        $this->setConfig($provider);

        try {
            $user = \Socialite::with($provider)->user();

            if ($user->email == null) {
                return redirect('login')->with(['warning' => 'Cannot register account with empty email.']);
            }

            auth()->login($accountService->findOrCreate($user, $provider), true);
            return redirect()->to('dashboard')->with('success', 'Welcome home '.$user->getName());
        } catch (\Exception $e) {
            if (app()->environment(['local', 'testing'])) {
                $message = 'Something wrong: '.$e;
            } else {
                $message = 'Something wrong. Contact sysadmin!';
            }
            return redirect('login')->with('error', $message);
        }
    }

    protected static function unavailable($provider)
    {
        return redirect()->back()
            ->with('warning', sprintf('Provider %s not available.', $provider));
    }

    /**
     * Get config from database.
     *
     * @return array
     */
    protected function setConfig($provider)
    {
        \Config::set('services.'.$provider.'.client_id', option('oauth_'.$provider.'_client'));
        \Config::set('services.'.$provider.'.client_secret', option('oauth_'.$provider.'_secret'));
        \Config::set('services.'.$provider.'.redirect', config('app.url').'/auth/'.$provider.'/callback');
    }

    public function disconnect($provider)
    {
        if (option('enable_auth_'. $provider) != 'true') {
            return static::unavailable($provider);
        }

        $del = UserSocialAccount::where([
            'provider_name' => $provider,
            'user_id' => Auth::user()->id,
        ])->delete();

        if ($del) {
            return redirect()->route('setting.account')
                ->with(['success', __('Account disconnected.')]);
        } else {
            return redirect()->route('setting.account')
                ->with(['warning', __('Failed to disconnect account.')]);
        }
    }
}
