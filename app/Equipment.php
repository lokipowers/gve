<?php

namespace App;

use App\Http\Controllers\Traits\CurrencyConverter;
use App\Http\Controllers\Traits\ShippingCalculator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Equipment extends Model
{
    use SoftDeletes;
    use Searchable;
    use CurrencyConverter;
    use ShippingCalculator;

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

    public function getShippingCostAttribute()
    {
        $user = \Auth()->user();
        $character = $user->character;
        $currency = 'USD';
        $itemType = strtolower($this->type);
        if($character!== null){
            $currency = $character->currency->iso_code;
        }

        $shippingCost = $this->getShippingCost($this->location_id, $character->current_location_id, $this->$itemType, $this->type);

        return $shippingCost;
    }

    public function getLocalShippingCostAttribute()
    {
        $user = \Auth()->user();
        $character = $user->character;
        $currency = 'USD';
        $itemType = strtolower($this->type);
        if($character!== null){
            $currency = $character->currency->iso_code;
        }
        return $this->getConvertedCurrency($this->shippingCost, $currency)->converted;
    }

    public function getLocalShippingDurationAttribute()
    {
        $user = \Auth()->user();
        $character = $user->character;

        return $this->getShippingDuration($this->location_id, $character->current_location_id);
    }

}
