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
            "Голубицкая" => 3,
            "Приморский" => 3,
            "Береговое" => 3,
            "Феодосия" => 3,
            "Коктебель" => 3,
            "Судак" => 3,
            "Симферополь" => 3,
            "Алушта" => 3,
            "Гурзуф" => 3,
            "Ялта" => 3,
            "Витязево" => 2,
            "Анапа" => 2,
            "Кабардинка" => 2,
            "Геленджик" => 2,
            "Лермонтово" => 1,
            "Новомихайловский" => 1,
            "Дедеркой" => 1,
            "Лазаревское" => 1,
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
