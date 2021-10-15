<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfoliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('portfolios')->truncate();
        DB::table('portfolios')->insert([
            [
                'id' => 1,
                'name' => 'Coca',
            ],
            [
                'id' => 2,
                'name' => 'Pepsi',
            ],
            [
                'id' => 3,
                'name' => 'Fanta',
            ],
            [
                'id' => 4,
                'name' => 'Mavel',
            ],
            [
                'id' => 5,
                'name' => 'DC',
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
