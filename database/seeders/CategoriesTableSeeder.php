<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Honey', 'description' => 'Products related to honey'],
            ['name' => 'Beeswax', 'description' => 'Products made from beeswax'],
            ['name' => 'Royal Jelly', 'description' => 'Products containing royal jelly'],
        ];

        // Insert data into the categories table
        DB::table('categories')->insert($categories);
    }
}
