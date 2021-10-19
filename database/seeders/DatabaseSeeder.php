<?php

namespace Database\Seeders;

use App\Models\Event;
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
        Event::factory()->count(40)->create();
        $this->call([
            PortfoliosSeeder::class,
//            EventSeeder::class,
        ]);
    }
}
