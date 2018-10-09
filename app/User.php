<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Appstract\Meta\Metable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Metable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'disabled',
        'email_verified_at',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
            'disabled' => false,
        ])->save();
    }

    /**
     * User social acounts.
     *
     * @return array
     */
    public function socialAccounts()
    {
        return $this->hasMany('App\UserSocialAccount');
    }
}
