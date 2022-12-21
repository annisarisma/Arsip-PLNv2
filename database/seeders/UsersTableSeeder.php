<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama_depan' => 'Super',
                'nama_belakang' => 'Admin',
                'username' => 'administrator',
                'unit_id' => '1',
                'email' => 'administrator@gmail.com',
                'status' => 'Aktif',
                'password'=> Hash::make('123'),
                'role' => 'superadmin',
                'status' => 'Disetujui'
            ],
        ]);
    }
}
