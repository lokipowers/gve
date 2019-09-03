<?php

namespace App;

use App\Http\Controllers\Traits\CurrencyConverter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Equipment extends Model
{
    use SoftDeletes;
    use Searchable;
    use CurrencyConverter;

    protected $with = [
        'vehicle'
    ];

    protected $fillable = [
        'equipment_id',
        'type',
        'cost_dollars',
        'cost_coin',
        'cost_dollars_sale',
        'cost_coin_sale'
    ];

    public function vehicle()
    {
        return $this->hasOne('App\Vehicle', 'id', 'equipment_id');
    }

    public function getCostPriceAttribute()
    {
        $user = \Auth()->user();
        $character = $user->character;
        $currency = 'USD';
        if($character!== null){
            $currency = $character->currency->iso_code;
        }
        return $this->getConvertedCurrency($this->cost_dollars, $currency);
    }

}
