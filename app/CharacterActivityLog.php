<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'character_id',
        'content',
        'icon',
        'status_code'
    ];


    public function user(){
        return $this->hasOne('App\User');
    }

    public function character(){
        return $this->hasOne('App\Character');
    }
}
