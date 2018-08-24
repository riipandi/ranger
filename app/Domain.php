<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table = 'domains';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'master',
        'last_check',
        'type',
        'notified_serial',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
