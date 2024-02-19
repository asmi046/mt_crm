<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class ReisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include "data/mt_br_reis.php";

        foreach ($mt_br_reis as $item) {

            if ($item['turtype'] > 3) continue;

            DB::table("reis")->insert(
                [
                    "start_to_date" => $item['start_to_date'],
                    "prib_to_date" => $item['prib_to_date'],
                    "start_out_date" => $item['start_out_date'],
                    "prib_out_date" => $item['prib_out_date'],
                    "bus" => 1,
                    "information" => "",
                    "direction_id" => $item['turtype'],
                ]
            );
        }
    }
}
