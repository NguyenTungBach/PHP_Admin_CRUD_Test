<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('orders')->truncate();
        DB::table('orders')->insert([
            [
                'name' => 'Lipstick',
                'images' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR81NLdW06WdMGkj160-JKrFThFXCYqSyShd85PTd4uRDpEnmHw',
                'description' => 'Lipstick is a cosmetic product containing pigments, oils-v, waxes, and emollients that apply color, texture, and protection to the lips.'
            ],
            [
                'name' => 'Lip Gloss',
                'images' => 'https://media.loveitopcdn.com/6458/kcfinder/upload//images/cach-lam-son-bong-handmade-cho%20moi-cang-mong.jpg',
                'description' => 'Lip gloss is a product used primarily to give lips a glossy lustre, and sometimes to add a subtle color. It is distributed as a liquid or a soft solid (not to be confused with lip balm, which generally has medical or soothing purposes) or lipstick, which generally is a solid, cream like substance that gives off a more pigmented color',
            ]
        ]);
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
