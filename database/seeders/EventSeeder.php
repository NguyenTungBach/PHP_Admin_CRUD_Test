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
                'eventName' => 'History Game Of Award 2011',
                'bandNames' => 'A',
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now(),
                'portfolio_id' => 1,
                'ticketPrice' => 20000,
                'status' => 1,
            ],
            [
                'id' => 2,
                'eventName' => 'History Game Of Award 2012',
                'bandNames' => 'B',
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now(),
                'portfolio_id' => 2,
                'ticketPrice' => 30000,
                'status' => 1,
            ],
            [
                'id' => 3,
                'eventName' => 'History Game Of Award 2013',
                'bandNames' => 'C',
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now(),
                'portfolio_id' => 3,
                'ticketPrice' => 40000,
                'status' => 2,
            ],
            [
                'id' => 4,
                'eventName' => 'History Game Of Award 2014',
                'bandNames' => 'D',
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now(),
                'portfolio_id' => 4,
                'ticketPrice' => 50000,
                'status' => 3,
            ],
            [
                'id' => 5,
                'eventName' => 'History Game Of Award 2015',
                'bandNames' => 'E',
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now(),
                'portfolio_id' => 5,
                'ticketPrice' => 60000,
                'status' => 0,
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
