<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordType extends Model
{
    protected $table = 'recordtype';

    protected $fillable = ['name', 'description'];

    // public function records() {
    //     return $this->hasMany(Record::class);
    // }
}
