<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends BaseController
{

    public function index()
    {

        $properties = Property::where([
            ['location_id', '=', $this->character->current_location_id],
            ['side', '=', $this->character->side]
        ])->paginate(10);

        $this->addData('properties', $properties);
        return $this->buildView('property.index');

    }

    public function claim($id)
    {
        $property = Property::find($id);
        if($property->owner_id !== null){
            return back()->withErrors('Property already claimed.');
        }

        $property->owner_id = $this->character->id;
        $property->save();

        // @TODO ADD LOCATION EVENT

        return back()->with('success', [$property->name . ' has been claimed!']);
    }
}
