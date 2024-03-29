<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateLocations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gve:generateLocations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh and seed Locations Table';

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
        $this->line('Refreshing Locations Table');
        \Artisan::call('migrate:refresh --path=/database/migrations/2019_08_21_071917_create_locations_table.php');
        $this->line('Seeding Locations Table');
        \Artisan::call('db:seed --class=LocationsTableSeeder');
        $this->info('Done');
    }
}
