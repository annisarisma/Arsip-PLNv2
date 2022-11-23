<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('categories')->insert([
            ['unit_id' => '1','category_name' => 'Kategori A'],
            ['unit_id' => '1','category_name' => 'Kategori B'],
            ['unit_id' => '1','category_name' => 'Kategori C'],
            ['unit_id' => '2','category_name' => 'Kategori A'],
            ['unit_id' => '2','category_name' => 'Kategori B'],
            ['unit_id' => '2','category_name' => 'Kategori C'],
            ['unit_id' => '3','category_name' => 'Kategori A'],
            ['unit_id' => '3','category_name' => 'Kategori B'],
            ['unit_id' => '3','category_name' => 'Kategori C'],
            ['unit_id' => '4','category_name' => 'Kategori A'],
            ['unit_id' => '4','category_name' => 'Kategori B'],
            ['unit_id' => '4','category_name' => 'Kategori C'],
        ]);
    }
}
