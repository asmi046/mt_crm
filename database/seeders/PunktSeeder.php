<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class PunktSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $d1 = [
            "Голубицкая" => 1,
            "Приморский" => 1,
            "Береговое" => 1,
            "Феодосия" => 1,
            "Коктебель" => 1,
            "Судак" => 1,
            "Симферополь" => 1,
            "Алушта" => 1,
            "Гурзуф" => 1,
            "Ялта" => 1,
            "Витязево" => 2,
            "Анапа" => 2,
            "Кабардинка" => 2,
            "Геленджик" => 2,
            "Лермантово" => 3,
            "Новомихайловский" => 3,
            "Дедеркой" => 3,
            "Лазаревское" => 3,
        ];

        foreach ($d1 as $key => $value) {
            $pId = DB::table("punkts")->insertGetId(
                    [
                        "name" => $key,
                        'description' => "Пункт прибывания: ".$key,
                    ]);

            DB::table("direction_punkt")->insert(
                    [
                        "direction_id" => $value,
                        'punkt_id' => $pId,
                    ]);

        }

    }
}
