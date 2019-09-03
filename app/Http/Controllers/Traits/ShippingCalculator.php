<?php


namespace App\Http\Controllers\Traits;


use App\Location;

trait ShippingCalculator
{
    protected function getShippingCost($origin, $destination, $equipment, $type)
    {

        $originLocation = Location::where('id', $origin)->first();
        $destinationLocation = Location::where('id', $destination)->first();

        // Get Distance.
        $distance = ($this->calculateDistance($originLocation, $destinationLocation) * 20);

        // Get Size
        $volume = $this->calclulateItemSize($equipment);

        // Do size + weight + distance * 0.02.
        $shippingCost = (( ($volume / 100000) + $equipment->weight + $distance) / 100);


        return $shippingCost;

    }

    protected function getShippingDuration($origin, $destination)
    {

        $originLocation = Location::where('id', $origin)->first();
        $destinationLocation = Location::where('id', $destination)->first();

        $distance = (int)$this->calculateDistance($originLocation, $destinationLocation);

        if($distance == 0){
            return 'Instant';
        }


        return (int)(($distance / 60) / 2);

    }

    private function calclulateItemSize($item)
    {
        return ($item->height * $item->width * $item->length);
    }


    private function calculateDistance($origin, $destination)
    {
        $latitudeFrom = $origin->latitude;
        $longitudeFrom = $origin->longitude;
        $latitudeTo = $destination->latitude;
        $longitudeTo = $destination->longitude;
        // Metres
        //$earthRadius = 6371000;
        // Miles
        $earthRadius = 3959;

        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;

    }
}
