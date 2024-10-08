<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert categories into the categories table
        DB::table('categories')->insert([
            ['name' => 'Monitors'],
            ['name' => 'Watches'],
            ['name' => 'Housing Devices'],
            ['name' => 'Tractor Attachments'],
            ['name' => 'Marine Electronics'],
            ['name' => 'Computer Accessories'],
            ['name' => 'Fitness Equipment'],
            ['name' => 'Woodworking Tools'],
            ['name' => 'Mobile Phones'],
            ['name' => 'Audio Technology'],
        ]);
    }
}
