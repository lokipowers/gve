<?php

use App\Properties;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RanksTableSeeder::class]);
        $this->call([LocationsTableSeeder::class]);
        $this->call([PropertiesTableSeeder::class]);
        $this->call([CurrencyRatesTableSeeder::class]);
    }
}
