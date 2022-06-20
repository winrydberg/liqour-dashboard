<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_cities')->insert([
            'name' => 'Ofankor',
            'region' => 'Greater Accra',
            'delivery_charge' => 20.00
        ]);

        DB::table('delivery_cities')->insert([
            'name' => 'Madina',
            'region' => 'Greater Accra',
            'delivery_charge' => 30.00
        ]);
    }
}