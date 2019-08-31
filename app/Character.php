<?php

namespace App;

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\Traits\CurrencyConverter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Character extends Model
{
    use SoftDeletes;
    use Searchable;
    use CurrencyConverter;

    protected $table = 'characters';

    protected $with = [
        'equipment',
        'location',
        'rank',
        'activity'
    ];

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'side',
        'rank_id',
        'current_location_id',
        'dollars',
        'gve_coin'
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

    public function activity(){
        return $this->hasMany('App\CharacterActivityLog');
    }

    public function getCurrencyAttribute()
    {
        return $this->getConvertedCurrency($this->dollars, $this->location->currency);
    }

    public function getAvatarUrlAttribute()
    {
        $characterController = new CharacterController();
        return $characterController->getCharacterAvatar($this);
    }
}
