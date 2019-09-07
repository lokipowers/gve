<?php


namespace App\Http\Controllers\Schedule;


use App\CharacterEquipment;
use App\Http\Broadcast\CharacterNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;

class CheckEquipmentArrival
{

    public function checkArrivals()
    {
        $equipmentList = CharacterEquipment::where('has_arrived', 0)->get();

        foreach($equipmentList as $equipment){
            $arrivalTime = Carbon::parse($equipment->arrival_time)->format('Y-m-d h:i');
            $now = now()->format('Y-m-d h:i');

            if($arrivalTime == $now){
                $equipment->has_arrived = 1;
                $equipment->save();

                $equipmentType = $equipment->type;
                $equipmentName = $equipment->item->$equipmentType->name;


                event( new CharacterNotification($equipment->character_id, 'shopping_basket', 'Your ' . $equipmentName . ' as arrived.'));
            }

        }

    }

}
