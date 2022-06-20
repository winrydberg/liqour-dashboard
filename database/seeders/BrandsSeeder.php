<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'name' => 'Baileys',
        ]);
        DB::table('brands')->insert([
            'name' => 'Black Label',
        ]);
        DB::table('brands')->insert([
            'name' => 'Red Label',
        ]);
        DB::table('brands')->insert([
            'name' => 'Pine',
        ]);

    }
}