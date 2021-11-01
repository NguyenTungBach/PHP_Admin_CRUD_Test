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
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
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
                'thumbnail' => "https://image.thanhnien.vn/460x306/Uploaded/2021/fsmym/2021_10_01/giai-thuong-the-game-awards-2021-01_puwh.jpg?width=500",
                'status' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'eventName' => 'History Game Of Award 2012',
                'bandNames' => 'B',
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now(),
                'portfolio_id' => 2,
                'ticketPrice' => 30000,
                'thumbnail' => "https://site-cdn.givemesport.com/images/21/10/05/1ed5034e1eeee8c952d92c9a25f6f064/320.jpg",
                'status' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'eventName' => 'History Game Of Award 2013',
                'bandNames' => 'C',
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now(),
                'portfolio_id' => 3,
                'ticketPrice' => 40000,
                'thumbnail' => "https://cellphones.com.vn/sforum/wp-content/uploads/2021/10/The-Game-Awards-2019.jpg",
                'status' => 2,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'eventName' => 'History Game Of Award 2014',
                'bandNames' => 'D',
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now(),
                'portfolio_id' => 4,
                'ticketPrice' => 50000,
                'thumbnail' => "https://i.vietgiaitri.com/2021/10/2/the-game-awards-2021-cong-bo-ngay-ra-mat-bec25-6067652_default.jpg",
                'status' => 3,
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'eventName' => 'History Game Of Award 2015',
                'bandNames' => 'E',
                'startDate' => Carbon::now(),
                'endDate' => Carbon::now(),
                'portfolio_id' => 5,
                'ticketPrice' => 60000,
                'thumbnail' => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1oZr_wcj5Mg1XZYSSgWR3emSE0Wts40izDQ&usqp=CAU",
                'status' => 0,
                'created_at' => Carbon::now(),
            ],
        ]);
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
