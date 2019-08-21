<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use SoftDeletes;

    protected $table = 'characters';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function equipment()
    {
        return $this->hasMany('App\Equipment');
    }
}
