<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds. 
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            ['title' => 'Default Banner','description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'type' => 'Dashboard','status' => 'Aktif','image'=>'carousel_1.png'],
            ['title' => 'Default Background', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'type' => 'Login-Regist','status' => 'Aktif','image'=>'login.png'],
        ]);
    }
}
