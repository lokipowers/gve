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
            $locationId,
            100
        );
        $this->generateProperty(
            'Brothel',
            'BAD',
            '',
            'BROTHEL',
            $locationId,
            200
        );
        $this->generateProperty(
            'Restaurant',
            'BAD',
            '',
            'RESTAURANT',
            $locationId,
            300
        );
        $this->generateProperty(
            'Morgue',
            'BAD',
            '',
            'MORGUE',
            $locationId,
            100
        );
        $this->generateProperty(
            'Courier',
            'BAD',
            '',
            'COURIER',
            $locationId,
            100
        );

        /* Good Properties */
        $this->generateProperty(
            'Barracks',
            'GOOD',
            '',
            'BARRACKS',
            $locationId,
            100
        );
        $this->generateProperty(
            'Mess Hall',
            'GOOD',
            '',
            'MESS_HALL',
            $locationId,
            200
        );
        $this->generateProperty(
            'Firing Range',
            'GOOD',
            '',
            'FIRING_RANGE',
            $locationId,
            100
        );
        $this->generateProperty(
            'Assault Course',
            'GOOD',
            '',
            'ASSAULT_RANGE',
            $locationId,
            200
        );
        $this->generateProperty(
            'Holding Cell',
            'GOOD',
            '',
            'HOLDING_CELL',
            $locationId,
            300
        );

        /* Middle Properties */
        $this->generateProperty(
            'Launderette',
            'MIDDLE',
            '',
            'LAUNDERETTE',
            $locationId,
            100
        );
        $this->generateProperty(
            'Weapon Factory',
            'MIDDLE',
            '',
            'WEAPON_FACTORY',
            $locationId,
            200
        );
        $this->generateProperty(
            'Armour Factory',
            'MIDDLE',
            '',
            'ARMOUR_FACTORY',
            $locationId,
            200
        );
        $this->generateProperty(
            'Vehicle Factory',
            'MIDDLE',
            '',
            'VEHICLE_FACTORY',
            $locationId,
            100
        );
        $this->generateProperty(
            'Drug Factory',
            'MIDDLE',
            '',
            'DRUG_FACTORY',
            $locationId,
            300
        );
        $this->generateProperty(
            'Hospital',
            'MIDDLE',
            '',
            'HOSPITAL',
            $locationId,
            200
        );
    }

    protected function generateLocationProperties()
    {
        foreach($this->locations() as $location){
            $this->properties($location->id);
        }
    }


    protected function generateProperty($name, $side, $description, $type, $locationId, $salary)
    {
        $property = new \stdClass();
        $property->name = $name;
        $property->side = $side;
        $property->description = $description;
        $property->owner_id = null;
        $property->type = $type;
        $property->meta = null;
        $property->salary = $salary;
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
                'meta' => $property->meta,
                'location_id' => $property->location_id,
                'base_salary' => $property->salary,
                'defence' => 100,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return true;
    }
}
