<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'records';

    protected $fillable = [
        'domain_id', 'name', 'type', 'content', 'ttl', 'prio',
        'change_date', 'disabled', 'ordername', 'auth'
    ];

    public function records() {
        return $this->hasOne(Domain::class);
    }
}
