<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('events')->delete();
//        Product::factory()->count(10)->create();
//        Event::factory()->count(20)->create();
        $this->call([
            ProductSeeder::class,
            PortfoliosSeeder::class,
            EventSeeder::class,
        ]);
    }
}
