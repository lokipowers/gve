<?php

namespace App;

use App\Http\Controllers\Traits\CurrencyConverter;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use CurrencyConverter;

    protected $with = [
        'owner',
        'location'
    ];

    public function owner()
    {
        return $this->belongsTo('App\Character', 'owner_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function getSalaryAttribute()
    {
        $population = $this->location->population;

        return ( ($this->base_salary * $this->salary_multiplier) * ($population / 100000) );

    }

    public function getSalaryConvertedAttribute()
    {
        return $this->getConvertedCurrency($this->salary, $this->location->currency);
    }
}

