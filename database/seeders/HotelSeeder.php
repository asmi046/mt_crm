<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include "data/mt_br_hotel.php";

        foreach ($mt_br_hotel as $item) {

            DB::table("hotels")->insert(
                [
                    'name' => $item['name'],
                    'city' => $item['geo'],
                    'short_description' => "Тестовое краткое описание для отеля ".$item['name']." в городе".$item['geo'],
                ]
            );
        }
    }
}
