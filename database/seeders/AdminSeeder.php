<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Edwin Senunyeme',
            'email' => 'edwin@elcutoconsult.com',
            'password' => Hash::make('P@ssw0rd'),
            'role' => 'ADMIN'
        ]);

        DB::table('admins')->insert([
            'name' => 'Nana Gyau Amoah',
            'email' => 'nana@elcutoconsult.com',
            'password' => Hash::make('P@ssw0rd'),
            'role' => 'SUPERADMIN'
        ]);
    }
}