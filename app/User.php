<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'realname',
        'email',
        'password',
        'group_id',
        'activation_code',
        'confirmed',
        'disabled',
        'verified',
        'remember_token',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function domain()
    {
        return $this->hasMany(Task::class);
    }

    // public function verifyUser()
    // {
    //     return $this->hasOne('App\UserVerifyAccount');
    // }
}
