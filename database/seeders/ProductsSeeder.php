<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $table->string('images')->nullable();
        //     $table->decimal('price')->nullable();
        //     $table->decimal('sale_price')->nullable();
        //     $table->text('description')->nullable();
        //     $table->string('producttype')->nullable();
        //     $table->bigInteger('brand_id')->unsigned();
        //     $table->foreign('brand_id')->references('id')->on('brands');
        //     $table->bigInteger('product_category_id')->unsigned();
        //     $table->foreign('product_category_id')->references('id')->on('product_categories');
        DB::table('products')->insert([
            'name' => 'CIROC PINE',
            'images' => json_encode(['Ciroc-Pineapple.png']),
            'price' => 304.00,
            'sale_price' => 350.25,
            'producttype' => '1 Bottle',
            'product_category_id' => 1,
            'brand_id' => 4
        ]);

        DB::table('products')->insert([
            'name' => 'CIROC BLUE',
            'images' => json_encode(['bluepine.jpg']),
            'price' => 304.00,
            'sale_price' => 350.25,
            'producttype' => '1 Bottle',
            'product_category_id' => 1,
            'brand_id' => 4
        ]);

        DB::table('products')->insert([
            'name' => 'RED LABEL 1L',
            'images' => json_encode(['redlabel1.jpg']),
            'price' => 23.3,
            'sale_price' => 50.25,
            'producttype' => '1 Bottle',
            'product_category_id' => 1,
            'brand_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'RED LABEL 20cl',
            'images' => json_encode(['redlabel2.jpg']),
            'price' => 23.3,
            'sale_price' => 50.25,
            'producttype' => '1 Bottle',
            'product_category_id' => 1,
            'brand_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'BLACK LABEL 1L',
            'images' => json_encode(['blacklabel.png']),
            'price' => 216.67,
            'sale_price' => 250.25,
            'producttype' => '1 Bottle',
            'product_category_id' => 1,
            'brand_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'BLACK LABEL 20cl',
            'images' => json_encode(['blacklabel2.jpg']),
            'price' => 45.29,
            'sale_price' => 50.25,
            'producttype' => '1 Bottle',
            'product_category_id' => 1,
            'brand_id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'BAILEYS 20cL',
            'images' => json_encode(['baileys.jpg']),
            'price' => 27.83,
            'sale_price' => 50.25,
            'producttype' => '1 Bottle',
            'product_category_id' => 1,
            'brand_id' => 1
        ]);
    }
}