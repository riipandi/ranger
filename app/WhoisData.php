<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhoisData extends Model
{
    protected $table = 'whois_cache';

    protected $fillable = [
        'domain', 'result'
    ];
}
