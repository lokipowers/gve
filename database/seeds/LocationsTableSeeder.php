<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{

    /**
     * @var array
     */
    protected $locations;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->europeanLocations();
        DB::table('ranks')->insert($this->locations);
    }

    protected function buildLocations($locations)
    {

        $index = 0;
        foreach($locations as $location) {
            $this->locations[] = [
                'name' => $location->name,
                'description' => $location->description,
                'latitude' => $location->latitude,
                'longitude' => $location->longitude,
                'country' => $location->country,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now()
            ];
            $index++;
        }
        return true;
    }

    protected function europeanLocations()
    {

        $london = $this->generateLocation(
            'London',
            '',
            '', '',
            'United Kingdom'
        );
        $tirana = $this->generateLocation(
            'Tirana',
            '',
            '', '',
            'Albania'
        );
        $andorraLaVella = $this->generateLocation(
            'Andorra la Vella',
            '',
            '', '',
            'Andorra'
        );
        $yerevan = $this->generateLocation(
            'Yerevan',
            '',
            '', '',
            'Armenia'
        );
        $vienna = $this->generateLocation(
            'Vienna',
            '',
            '', '',
            'Austria'
        );
        $baku = $this->generateLocation(
            'Baku',
            '',
            '', '',
            'Azerbaijan'
        );
        $minsk = $this->generateLocation(
            'Minsk',
            '',
            '', '',
            'Belarus'
        );
        $brussels = $this->generateLocation(
            'Brussels',
            '',
            '', '',
            'Belgium'
        );
        $sarajevo = $this->generateLocation(
            'Sarajevo',
            '',
            '', '',
            'Bosnia and Herzegovina'
        );
        $sofia = $this->generateLocation(
            'Sofia',
            '',
            '', '',
            'Bulgaria'
        );
        $zagreb = $this->generateLocation(
            'Zagreb',
            '',
            '', '',
            'Croatia'
        );
        $nicosia = $this->generateLocation(
            'Nicosia',
            '',
            '', '',
            'Cyprus'
        );
        $prague = $this->generateLocation(
            'Prague',
            '',
            '', '',
            'Czechia'
        );
        $copenhagen = $this->generateLocation(
            'Copenhagen',
            '',
            '', '',
            'Denmark'
        );
        $tallinn = $this->generateLocation(
            'Tallinn',
            '',
            '', '',
            'Estonia'
        );
        $helsinki = $this->generateLocation(
            'Helsinki',
            '',
            '', '',
            'Finland'
        );
        $paris = $this->generateLocation(
            'Paris',
            '',
            '', '',
            'France'
        );
        $tbilisi = $this->generateLocation(
            'Tibilsi',
            '',
            '', '',
            'Georgia'
        );
        $berlin = $this->generateLocation(
            'Berlin',
            '',
            '', '',
            'Germany'
        );
        $athens = $this->generateLocation(
            'Athens',
            '',
            '', '',
            'Greece'
        );
        $budapest = $this->generateLocation(
            'Budapest',
            '',
            '', '',
            'Hungary'
        );
        $reykjavik = $this->generateLocation(
            'Reykjavik',
            '',
            '', '',
            'Iceland'
        );
        $dublin = $this->generateLocation(
            'Dublin',
            '',
            '', '',
            'Ireland'
        );
        $rome = $this->generateLocation(
            'Rome',
            '',
            '', '',
            'Italy'
        );
        $nursultan = $this->generateLocation(
            'Nur-Sultan',
            '',
            '', '',
            'Kazakhstan'
        );
        $pristina = $this->generateLocation(
            'Pristina',
            '',
            '', '',
            'Kosovo'
        );




        $this->buildLocations(
            [
                $london,
                $tirana,
                $andorraLaVella,
                $yerevan,
                $vienna,
                $baku,
                $minsk,
                $brussels,
                $sarajevo,
                $sofia,
                $zagreb,
                $nicosia,
                $prague,
                $copenhagen,
                $tallinn,
                $helsinki,
                $paris,
                $tbilisi,
                $berlin,
                $athens,
                $budapest,
                $reykjavik,
                $dublin,
                $rome,
                $nursultan,
                $pristina
            ]
        );
    }

    /**
     * @param $name string
     * @param $description string
     * @param $lat string
     * @param $lng string
     * @param $country string
     * @return stdClass
     */
    protected function generateLocation($name, $description, $lat, $lng, $country)
    {
        $location = new stdClass();
        $location->name = $name;
        $location->description = $description;
        $location->latitude = $lat;
        $location->longitude = $lng;
        $location->country = $country;

        return $location;
    }
}
