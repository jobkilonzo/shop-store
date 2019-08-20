<?php

use Illuminate\Database\Seeder;
use Store\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
          'name' => 'Rice',
          'retail_price' => 100,
          'wholesale_price' => 5000
        ]);
    }
}
