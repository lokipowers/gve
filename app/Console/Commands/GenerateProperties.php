<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateProperties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gve:generateProperties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh and create all Properties';

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
        $this->line('Refreshing Properties Table');
        \Artisan::call('migrate:refresh --path=/database/migrations/2019_08_26_195746_create_properties_table.php');
        $this->line('Seeding Properties Table');
        \Artisan::call('db:seed --class=PropertiesTableSeeder');
        $this->info('Done');
    }
}
