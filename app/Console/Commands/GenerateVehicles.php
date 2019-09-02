<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateVehicles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gve:generateVehicles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh and create all Vehicles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Refreshing Vehicles Table');
        \Artisan::call('migrate:refresh --path=/database/migrations/2019_09_01_145204_create_vehicles_table.php');
        $this->line('Seeding Vehicles Table');
        \Artisan::call('db:seed --class=VehiclesTableSeeder');
        $this->info('Done');
    }
}
