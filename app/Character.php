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

    protected $with = [
        'equipment',
        'location',
        'rank'
    ];

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'side',
        'rank_id',
        'current_location_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function equipment()
    {
        return $this->hasMany('App\CharacterEquipment');
    }

    public function location()
    {
        return $this->hasOne('App\Location', 'id', 'current_location_id');
    }

    public function rank()
    {
        return $this->hasOne('App\Rank', 'id', 'rank_id');
    }
}
