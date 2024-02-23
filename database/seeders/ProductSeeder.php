<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
     {
                $products =[
                    [
                    'category_id' => 1,
                    'name' => 'Sample Product 1',
                    'slug' => 'honey',
                    'description' => 'Description for Sample Product 1',
                    'price' => 19.99,
                    'quantity' => 100,
                  ],
                  [
                    'category_id' => 2,
                    'name' => 'Sample Product 2',
                    'slug' => 'honey',
                    'description' => 'Description for Sample Product 2',
                    'price' => 29.99,
                    'quantity' => 50,
                  ],
                  [
                    'category_id' => 3,
                    'name' => 'Sample Product 2',
                    'slug' => 'honey',
                    'description' => 'Description for Sample Product 2',
                    'price' => 29.99,
                    'quantity' => 50,
                  ]        ];
                  
                DB::table('products')->insert($products);
            }
}
