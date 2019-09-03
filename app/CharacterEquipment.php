<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CharacterEquipment extends Model
{
    use SoftDeletes;

    protected $with = [
        'item'
    ];

    public function item()
    {
        return $this->belongsTo('App\Equipment', 'equipment_id', 'equipment_id');
    }
}
