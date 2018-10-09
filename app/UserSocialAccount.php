<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model
{
    protected $table = 'users_social';

    protected $fillable = [
        'user_id', 'provider_id', 'provider_name', 'access_token', 'refresh_token',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
