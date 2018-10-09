<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as ProviderUser;

class UserSocialService
{
    public function findOrCreate(ProviderUser $providerUser, $provider)
    {
        $account = UserSocialAccount::where('provider_name', $provider)
            ->where('provider_id', $providerUser->getId())->first();

        if ($account) {
            return $account->user;
        } else {
            $user = User::where('email', $providerUser->getEmail())->first();

            if (!$user) {

                $userpass = strtolower(str_random(4).substr(time(), 0, 6));

                $user = User::create([
                    'email'             => $providerUser->getEmail(),
                    'name'              => $providerUser->getName(),
                    'username'          => $this->createUsername($providerUser),
                    'password'          => Hash::make($userpass),
                    'email_verified_at' => date('Y-m-d H:i:s'),
                    'disabled'          => false,
                ]);

                // Not available for now
                // $user_id = User::where('email', $providerUser->getEmail())->get()->first()->id;
                // $this->createUserMeta($user_id, $provider, $providerUser);

                // dispatch(new \App\Jobs\SendEmailSignupBySocial($user, $userpass));
            }

            $user->socialAccounts()->create([
                'provider_id'   => $providerUser->getId(),
                'provider_name' => $provider,
            ]);

            return $user;
        }
    }

    private function createUsername($providerUser) {

        $firstname = $this->getFirstName($providerUser->getName());
        $username  = $providerUser->getNickname();

        if ($username == null) {
            $username = str_slug($firstname.mt_rand(0000, 9999), '');
        } elseif ($check = User::where('username', $username)->exists()) {
            $username = str_slug($firstname.mt_rand(0000, 9999), '');
        }

        return $username;
    }

    private function getFirstName($fullName, $checkFirstNameLength = true)
    {
        // Split out name so we can quickly grab the first name part
        $nameParts = explode(' ', $fullName);
        $firstName = $nameParts[0];

        // If the first part of the name is a prefix, then find the name differently
        if (in_array(strtolower($firstName), array('mr', 'ms', 'mrs', 'miss', 'dr'))) {
            if ($nameParts[2] != '') {
                // E.g. Mr James Smith -> James
                $firstName = $nameParts[1];
            } else {
                // e.g. Mr Smith (no first name given)
                $firstName = $fullName;
            }
        }

        // make sure the first name is not just "J", e.g. "J Smith" or "Mr J Smith" or even "Mr J. Smith"
        if ($checkFirstNameLength && strlen($firstName) < 3) {
            $firstName = $fullName;
        }
        return $firstName;
    }

    // private function createUserMeta($user, $provider, $providerUser)
    // {
    //     if ($provider == 'google') {
    //         $data = [
    //             'gender'       => $providerUser->gender,
    //             'birth_date'   => $providerUser->birthday,
    //         ];
    //     } elseif ($provider == 'facebook') {
    //         $data = [
    //             'gender'       => $providerUser->user_gender,
    //             'birth_date'   => $providerUser->user_birthday,
    //         ];
    //     } else {
    //         $data = [];
    //     }

    //     return UserMetadata::create([
    //         'user_id'  => $user,
    //         'metadata' => $data,
    //     ]);
    // }
}
