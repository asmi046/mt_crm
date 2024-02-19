<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("buses")->insert(
            [
                [
                    'name' => "Автобус 53 местный",
                    'mest' => 53,
                    'schema' => "bus_53",
                ],

                [
                    'name' => "Автобус 49 местный",
                    'mest' => 49,
                    'schema' => "bus_49",
                ],

                [
                    'name' => "Автобус 18 местный",
                    'mest' => 18,
                    'schema' => "bus_18",
                ],
            ]
        );
    }
}
