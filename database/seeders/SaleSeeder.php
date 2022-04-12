<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::factory()->for(Customer::factory(), 'customer')
            ->hasAttached(Product::factory()->count(2), ['sold_price' => 5000],'product_sold')->create();
    }
}
