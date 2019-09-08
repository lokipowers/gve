<?php

use App\Vehicle;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;

class VehiclesTableSeeder extends Seeder
{

    protected $vehiclesRaw;

    protected $vehiclesParsed;


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->vehicles();
        dd($this->command);
        $this->command->info('Gathered Vehicle Data');
        //$this->buildVehicles();
        //DB::table('vehicles')->insert($this->vehiclesParsed);
    }

}
