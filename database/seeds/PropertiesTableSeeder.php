<?php

use App\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class PropertiesTableSeeder extends Seeder
{

    /**
     * @var array
     */
    protected $propertiesRaw;

    protected $propertiesParsed;

    protected $locations;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->generateLocationProperties();
        $this->buildProperties();
        $collection = collect($this->propertiesParsed);
        $chunks = $collection->chunk(10);
        $chunks->toArray();
        foreach($chunks as $chunk) {
            DB::table('properties')->insert($chunk->toArray());
        }
    }

    protected function locations()
    {
        return Location::all();
    }

    protected function properties($locationId)
    {
        /* Bad Properties */
        $this->generateProperty(
            'Safehouse',
            'BAD',
            '',
            'SAFEHOUSE',
            $locationId
        );
        $this->generateProperty(
            'Brothel',
            'BAD',
            '',
            'BROTHEL',
            $locationId
        );
        $this->generateProperty(
            'Restaurant',
            'BAD',
            '',
            'RESTAURANT',
            $locationId
        );
        $this->generateProperty(
            'Morgue',
            'BAD',
            '',
            'MORGUE',
            $locationId
        );
        $this->generateProperty(
            'Courier',
            'BAD',
            '',
            'COURIER',
            $locationId
        );

        /* Good Properties */
        $this->generateProperty(
            'Barracks',
            'GOOD',
            '',
            'BARRACKS',
            $locationId
        );
        $this->generateProperty(
            'Mess Hall',
            'GOOD',
            '',
            'MESS_HALL',
            $locationId
        );
        $this->generateProperty(
            'Firing Range',
            'GOOD',
            '',
            'FIRING_RANGE',
            $locationId
        );
        $this->generateProperty(
            'Assault Course',
            'GOOD',
            '',
            'ASSAULT_RANGE',
            $locationId
        );
        $this->generateProperty(
            'Holding Cell',
            'GOOD',
            '',
            'HOLDING_CELL',
            $locationId
        );

        /* Middle Properties */
        $this->generateProperty(
            'Launderette',
            'MIDDLE',
            '',
            'LAUNDERETTE',
            $locationId
        );
        $this->generateProperty(
            'Weapon Factory',
            'MIDDLE',
            '',
            'WEAPON_FACTORY',
            $locationId
        );
        $this->generateProperty(
            'Armour Factory',
            'MIDDLE',
            '',
            'ARMOUR_FACTORY',
            $locationId
        );
        $this->generateProperty(
            'Vehicle Factory',
            'MIDDLE',
            '',
            'VEHICLE_FACTORY',
            $locationId
        );
        $this->generateProperty(
            'Drug Factory',
            'MIDDLE',
            '',
            'DRUG_FACTORY',
            $locationId
        );
        $this->generateProperty(
            'Hospital',
            'MIDDLE',
            '',
            'HOSPITAL',
            $locationId
        );
    }

    protected function generateLocationProperties()
    {
        foreach($this->locations() as $location){
            $this->properties($location->id);
        }
    }


    protected function generateProperty($name, $side, $description, $type, $locationId)
    {
        $property = new \stdClass();
        $property->name = $name;
        $property->side = $side;
        $property->description = $description;
        $property->owner_id = null;
        $property->type = $type;
        $property->icon = null;
        $property->meta = null;
        $property->location_id = $locationId;

        $this->propertiesRaw[] = $property;
    }

    protected function buildProperties()
    {
        foreach($this->propertiesRaw as $property) {
            $this->propertiesParsed[] = [
                'name' => $property->name,
                'description' => $property->description,
                'side' => $property->side,
                'owner_id' => $property->owner_id,
                'type' => $property->type,
                'icon' => $property->icon,
                'meta' => $property->meta,
                'location_id' => $property->location_id,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return true;
    }
}
