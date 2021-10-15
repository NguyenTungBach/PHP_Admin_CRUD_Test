<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('events')->truncate();
        DB::table('events')->insert([
            [
                'id' => 1,
                'eventName' => 'Game Of Award',
                'bandNames' => 'A',
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now(),
                'portfolio_id' => 1,
                'ticketPrice' => 20000,
                'status' => 1,
            ],
            [
                'id' => 2,
                'eventName' => 'Game Of Award',
                'bandNames' => 'B',
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now(),
                'portfolio_id' => 2,
                'ticketPrice' => 30000,
                'status' => 1,
            ],
            [
                'id' => 3,
                'eventName' => 'Game Of Award',
                'bandNames' => 'C',
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now(),
                'portfolio_id' => 3,
                'ticketPrice' => 40000,
                'status' => 1,
            ],
            [
                'id' => 5,
                'eventName' => 'Game Of Award',
                'bandNames' => 'D',
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now(),
                'portfolio_id' => 4,
                'ticketPrice' => 50000,
                'status' => 1,
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
