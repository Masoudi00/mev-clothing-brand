<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'Mev-First',
                'price' => 200.00,
                'category' => 'Black',
                'image' => 'MevFront.png',
                'image2' => 'MevBack.png',
                'solde' => 1,
                'created_at' => '2024-04-21 13:51:24',
                'updated_at' => '2024-04-21 13:51:24',
            ],
            [
                'id' => 2,
                'name' => 'Mev-Rose',
                'price' => 180.00,
                'category' => 'White',
                'image' => 'MevRoseFront.png',
                'image2' => 'MevRoseBack.png',
                'solde' => 1,
                'created_at' => '2024-04-21 13:51:24',
                'updated_at' => '2024-04-21 13:51:24',
            ],
            [
                'id' => 3,
                'name' => 'Mev-Sky',
                'price' => 150.00,
                'category' => 'White',
                'image' => 'MevSkyFront.png',
                'image2' => 'MevSkyBack.png',
                'solde' => 1,
                'created_at' => '2024-04-21 13:51:24',
                'updated_at' => '2024-04-21 13:51:24',
            ],
            [
                'id' => 4,
                'name' => 'Mev-Versatility',
                'price' => 180.00,
                'category' => 'Black',
                'image' => 'VerstalityFrontB.png',
                'image2' => 'VerstalityBackB.png',
                'solde' => 1,
                'created_at' => '2024-04-21 13:51:24',
                'updated_at' => '2024-04-21 13:51:24',
            ],
            [
                'id' => 5,
                'name' => 'Mev-Master',
                'price' => 200.00,
                'category' => 'Black',
                'image' => 'BlackTFRONT.png',
                'image2' => 'BlackTBack.png',
                'solde' => 1,
                'created_at' => '2024-04-21 13:51:24',
                'updated_at' => '2024-04-21 13:51:24',
            ],
            [
                'id' => 6,
                'name' => 'Mev-Versatility',
                'price' => 180.00,
                'category' => 'White',
                'image' => 'VerstalityFront.png',
                'image2' => 'VerstalityBack.png',
                'solde' => 1,
                'created_at' => '2024-04-21 13:51:24',
                'updated_at' => '2024-04-21 13:51:24',
            ],
        ]);
    }
}
