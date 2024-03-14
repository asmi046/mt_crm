<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("directions")->insert(
            [
                [
                    "name" => "Курск - Лазаревское",
                    "start_punkt" => "Курск",
                    "end_punkt" => "Лазаревское",
                    'description' => 'Курск - Лазаревское',
                ],

                [
                    "name" => "Курск - Геленджик",
                    "start_punkt" => "Курск",
                    "end_punkt" => "Геленджик",
                    'description' => 'Курск - Геленджик',
                ],

                [
                    "name" => "Курск - Ялта",
                    "start_punkt" => "Курск",
                    "end_punkt" => "Ялта",
                    'description' => 'Курск - Ялта',
                ],


            ]
        );
    }
}
