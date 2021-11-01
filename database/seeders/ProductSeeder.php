<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('products')->truncate();
        DB::table('products')->insert([
            [
                'description' => "The Perfect Sandwich, A Real NYC Classic",
                'thumbnail' => "https://www.w3schools.com/w3images/sandwich.jpg",
                'price' => 20000,
                'detail' => "Just some random text, lorem ipsum text praesent tincidunt ipsum lipsum.",
                'quantity' => 10,
                'category_id' => 1,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
            [
                'description' => "The Perfect Sandwich, A Real NYC Classic",
                'thumbnail' => "https://www.w3schools.com/w3images/steak.jpg",
                'price' => 100000,
                'detail' => "Once again, some random text to lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.",
                'quantity' => 20,
                'category_id' => 2,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
            [
                'description' => "Cherries, interrupted",
                'thumbnail' => "https://www.w3schools.com/w3images/cherries.jpg",
                'price' => 200000,
                'detail' => "Lorem ipsum text praesent tincidunt ipsum lipsum.What else?",
                'quantity' => 30,
                'category_id' => 3,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
            [
                'description' => "Once Again, Robust Wine and Vegetable Pasta",
                'thumbnail' => "https://www.w3schools.com/w3images/wine.jpg",
                'price' => 550000,
                'detail' => "Lorem ipsum text praesent tincidunt ipsum lipsum.",
                'quantity' => 40,
                'category_id' => 4,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
            [
                'description' => "All I Need Is a Popsicle",
                'thumbnail' => "https://www.w3schools.com/w3images/popsicle.jpg",
                'price' => 660000,
                'detail' => "Lorem ipsum text praesent tincidunt ipsum lipsum.",
                'quantity' => 50,
                'category_id' => 5,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
            [
                'description' => "Salmon For Your Skin",
                'thumbnail' => "https://www.w3schools.com/w3images/salmon.jpg",
                'price' => 660000,
                'detail' => "Once again, some random text to lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.",
                'quantity' => 60,
                'category_id' => 6,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
            [
                'description' => "The Perfect Sandwich, A Real Classic",
                'thumbnail' => "https://www.w3schools.com/w3images/sandwich.jpg",
                'price' => 700000,
                'detail' => "Just some random text, lorem ipsum text praesent tincidunt ipsum lipsum.",
                'quantity' => 70,
                'category_id' => 7,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
            [
                'description' => "Le French",
                'thumbnail' => "https://www.w3schools.com/w3images/croissant.jpg",
                'price' => 800000,
                'detail' => "Lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.",
                'quantity' => 80,
                'category_id' => 8,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
        ]);
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
