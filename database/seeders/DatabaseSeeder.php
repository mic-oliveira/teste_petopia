<?php

namespace Database\Seeders;

use App\Models\State;
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
        $this->call([
            UserSeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            CustomerSeeder::class,
            SaleSeeder::class,
        ]);
    }
}
