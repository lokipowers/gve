<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Character extends Model
{
    use SoftDeletes;
    use Searchable;

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
