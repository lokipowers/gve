<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateActivities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gve:generateActivities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '...?';

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
        $this->line('Refreshing Activities Table');
        \Artisan::call('migrate:refresh --path=/database/migrations/2019_08_21_071929_create_activities_table.php');
        $this->line('Seeding Activities Table');
        \Artisan::call('db:seed --class=ActivitiesTableSeeder');
        $this->info('Done');
    }
}
