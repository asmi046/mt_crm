<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use DB;

class LogDataUpdateSeeder extends Seeder
{
    // pa app:create-user --name Asmi --email asmi046@gmail.com --pass 123 --agency MT
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $logs = DB::select('select * from logs');

        foreach ($logs as $log) {
            if (
                ($log->event === "Обновлено место") ||
                ($log->event === "Удалено место")
             ) {

                    if (preg_match("!<b>Рейс: </b>№(.*?) !si", $log->info, $reis_r)){
                        $affected = DB::table('logs')->where('id', $log->id)->update(['reis_id'=> (int)$reis_r[1]]);
                        echo $log->event.": ".$reis_r[1]. " (". $affected .")". PHP_EOL;
                    }

                    if (preg_match("!<b>№ места:</b> (.*?)\n\r!si", $log->info, $place_r)){
                        $affected = DB::table('logs')->where('id', $log->id)->update(['place_number'=> (int)$place_r[1]]);
                        echo $log->event.": ".$place_r[1]. " (". $affected .")". PHP_EOL;
                    }

                    if (preg_match("!<b>№ заказа:</b> (.*?)\n\r!si", $log->info, $order_r)){
                        $affected = DB::table('logs')->where('id', $log->id)->update(['order_id'=> (int)$order_r[1]]);
                        echo $log->event.": ".$order_r[1]. " (". $affected .")". PHP_EOL;
                    }
            }



            if (
                ($log->event === "Создана бронь") ||
                ($log->event === "Оформлена бронь") ||
                ($log->event === "Удалена бронь")
            ){

                    if (preg_match("!<b>Рейс: </b>№(.*?) !si", $log->info, $matches)){
                        $affected = DB::table('logs')->where('id', $log->id)->update(['reis_id'=> (int)$matches[1]]);
                        echo $log->event.": ".$matches[1]. " (". $affected .")". PHP_EOL;
                     }
            }

            if ($log->event === "Обновлена информация о брони") {


                if (str_contains($log->info, "Обновлена информация о брони №"))
                {
                    $bron_id = str_replace("Обновлена информация о брони №", "",$log->info);

                    $affected = DB::table('logs')->where('id', $log->id)->update(['order_id'=> (int)$bron_id]);

                    echo $log->event.": ".$bron_id. " (". $affected .")". PHP_EOL;
                }
            }
        }
    }
}
