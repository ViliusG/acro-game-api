<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PosesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('poses')->insert([
            'name' => Str::random(10),
            'difficulty' => rand(1,3),
            'type' => rand(1,2),
            'image_url' => 'https://peaceloveacroyoga.com/wp-content/uploads/2016/04/11903872_10153514400204707_1237292647090756664_n-300x300.jpg',
            'people_count' => 2,
            'description' => Str::random(50)
        ]);
    }
}
