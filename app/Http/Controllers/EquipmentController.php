<?php

namespace App\Http\Controllers;

use App\Character;
use App\CharacterEquipment;
use App\Equipment;
use App\Http\Broadcast\CharacterNotification;
use App\Http\Controllers\Traits\CharacterActivity;
use App\Http\Controllers\Traits\CurrencyConverter;
use App\Http\Controllers\Traits\ShippingCalculator;
use Illuminate\Http\Request;

class EquipmentController extends BaseController
{

    use ShippingCalculator;
    use CurrencyConverter;
    use CharacterActivity;

    public function indexMarketplace(Request $request)
    {
        $where = [];
        if(!empty($request->type)){
            $where[] = ['type' => $request->type];
        }

        $this->addData('equipment', Equipment::where($where)->paginate(10));
        return $this->buildView('equipment.index');

    }

    public function viewMarketplace($type, $id)
    {
        $equipment = Equipment::where('id', $id)->first();
        $this->addData($type, $equipment);
        return $this->buildView('equipment.type.'.$type);
    }

    public function purchaseItem($type, $id)
    {
        $equipment = Equipment::where('id', $id)->first();
        $character = Character::where('id', $this->getUser()->character->id)->first();
        $creator = Character::where('id', $equipment->character_id)->first();

        $character->dollars = bcsub($character->dollars, ($equipment->cost_dollars + $equipment->shippingCost), 4);

        if($equipment->quantity === 0){
            return redirect()->back()->withErrors('Out of stock.');
        }

        if((int)$character->dollars < 0){
            return redirect()->back()->withErrors('Not enough funds.');
        }

        $arrivalTime = now()->addMinutes($equipment->localShippingDuration);

        //dd((int)$character->dollars);

        //if($character->dollars > )

        $characterEquipment = new CharacterEquipment();

        $characterEquipment->character_id = $character->id;
        $characterEquipment->equipment_id = $equipment->$type->id;
        $characterEquipment->type = strtoupper($type);
        $characterEquipment->health = 100;
        $characterEquipment->max_health = $equipment->health ?? 100;
        $characterEquipment->base_attack = $equipment->base_attack ?? 0;
        $characterEquipment->base_defence = $equipment->base_defence ?? 0;
        $characterEquipment->current_attack = $characterEquipment->base_attack;
        $characterEquipment->current_defence = $characterEquipment->base_defence;
        $characterEquipment->cost_dollars = $equipment->cost_dollars;
        $characterEquipment->arrival_time = $arrivalTime;

        // Create Character Equipment
        $characterEquipment->save();

        // Update Character Available Dollars
        $character->update();

        // Update Equipment Qty
        $equipment->quantity = ($equipment->quantity - 1);
        $equipment->save();

        // Pay the creator
        $creator->dollars = bcadd($creator->dollars, $equipment->cost_dollars);
        $creator->save();

        $notificationIcon = 'shopping_basket';
        $notificationContent = 'You bought a nice new ' . $equipment->$type->name .' <img src="' . $equipment->$type->thumbnail . '" style="margin-top:10px;max-width:100%;height:auto" />';

        $this->logCharacterActivity($this->getUser()->id, $character->id, 'info', ucwords($type) . ' Purchased', $notificationContent, $notificationIcon);

        //event( new CharacterNotification($character->id, $notificationIcon, $notificationContent));

        return redirect()->back()->with('success', [$equipment->$type->name . ' has been purchased.']);

    }
}
