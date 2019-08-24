<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateRanks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gve:generateRanks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh and see Ranks Table';

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
        $this->line('Refreshing Ranks Table');
        \Artisan::call('migrate:refresh --path=/database/migrations/2019_08_21_074457_create_ranks_table.php');
        $this->line('Seeding Ranks Table');
        \Artisan::call('db:seed --class=RanksTableSeeder');
        $this->info('Done');
    }
}
