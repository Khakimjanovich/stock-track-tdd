<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Retailer;
use App\Models\Stock;
use Illuminate\Database\Seeder;

class RetailerWithProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $switch = Product::create(['name' => 'Nintendo Switch']);
        $retailer = Retailer::create(['name' => 'Best Buy']);

        $retailer->addStock($switch, new Stock([
            'price' => 1000,
            'url' => 'http://foo.com',
            'sku' => '12252',
            'in_stock' => false,
        ]));
    }
}
