<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            ['unit_name' => 'ADM & KEUANGAN'],
            ['unit_name' => 'PERIZINAN & PERTANAHAN'],
            ['unit_name' => 'K3L'],
            ['unit_name' => 'TEKNIK']
        ]);
    }
}
