<?php

namespace App\Http\Controllers;

use App\Models\Reis;
use Illuminate\Http\Request;
use App\Services\PlacesServices;

class ReportController extends Controller
{
    public function index() {
        $all_reises = Reis::orderBy('start_to_date',"ASC")->get();
        return view('reports', ['reises' => $all_reises]);
    }

    public function rassadca(int $reis_id, string $direction) {


        $place_service = new PlacesServices();

        if ($direction == 't') {
            $reis = Reis::where('id', $reis_id)->first();
            $reserves_places = $place_service->get_reserved_places($reis->id);
            $reserves_places = $reserves_places['t'];
            $schema = buss_schemm($reis->reis_bus->schema);
        }
        else {
            $reis_pr = Reis::where('id', $reis_id)->first();
            $reis = Reis::where('start_out_date', $reis_pr->prib_to_date)->where('direction_id', $reis_pr->direction_id)->first();
            if ($reis) {
                $reserves_places = $place_service->get_reserved_places($reis->id);
                $reserves_places = $reserves_places['o'];
                $schema = buss_schemm($reis->reis_bus->schema);
            } else {
                $reserves_places = null;
                $schema = null;
            }
        }



        return view('reports-rassadka', [
            'reserves_places' => $reserves_places,
            'schema' => $schema,
            'reis' => $reis,
        ]);
    }

    public function list(int $reis_id, string $direction) {


        $place_service = new PlacesServices();

        if ($direction == 't') {
            $reis = Reis::where('id', $reis_id)->first();
            $reserves_places = $place_service->get_reserved_places($reis->id);
            $reserves_places = $reserves_places['t'];
            $schema = buss_schemm($reis->reis_bus->schema);
        }
        else {
            $reis_pr = Reis::where('id', $reis_id)->first();
            $reis = Reis::where('start_out_date', $reis_pr->prib_to_date)->where('direction_id', $reis_pr->direction_id)->first();
            if ($reis) {
                $reserves_places = $place_service->get_reserved_places($reis->id);
                $reserves_places = $reserves_places['o'];
                $schema = buss_schemm($reis->reis_bus->schema);
            } else {
                $reserves_places = null;
                $schema = null;
            }
        }



        return view('reports-list', [
            'reserves_places' => $reserves_places,
            'schema' => $schema,
            'reis' => $reis,
            'reis_pr' => $reis_pr,
            'direction' => $direction
        ]);
    }

    public function list_csv(int $reis_id, string $direction) {


        $place_service = new PlacesServices();

        if ($direction == 't') {
            $reis = Reis::where('id', $reis_id)->first();
            $reserves_places = $place_service->get_reserved_places($reis->id);
            $reserves_places = $reserves_places['t'];
            $schema = buss_schemm($reis->reis_bus->schema);
        }
        else {
            $reis_pr = Reis::where('id', $reis_id)->first();
            $reis = Reis::where('start_out_date', $reis_pr->prib_to_date)->where('direction_id', $reis_pr->direction_id)->first();
            if ($reis) {
                $reserves_places = $place_service->get_reserved_places($reis->id);
                $reserves_places = $reserves_places['o'];
                $schema = buss_schemm($reis->reis_bus->schema);
            } else {
                $reserves_places = null;
                $schema = null;
            }
        }

        $file_name = $reis->direction->name.'_'.$reis->start_to_date.'_'.$direction.'.csv';

        $headers = [
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$file_name,
            'Expires' => '0',
            'Pragma' => 'public'
        ];

        $callback = function() use ($reserves_places)
        {
                $FH = fopen('php://output', 'w');

                fputcsv($FH, [
                    mb_convert_encoding('Бронь №', 'windows-1251', 'utf-8'),
                    mb_convert_encoding('Ф.И.О', 'windows-1251', 'utf-8'),
                    mb_convert_encoding('Дата рождения', 'windows-1251', 'utf-8'),
                    mb_convert_encoding('Телефон', 'windows-1251', 'utf-8'),
                    mb_convert_encoding('Документ', 'windows-1251', 'utf-8'),
                    mb_convert_encoding('Забронировал', 'windows-1251', 'utf-8'),
                    mb_convert_encoding('Проживание', 'windows-1251', 'utf-8'),
                    mb_convert_encoding('Пункт прибытия', 'windows-1251', 'utf-8'),
                    mb_convert_encoding('Комментарий места', 'windows-1251', 'utf-8'),
                    mb_convert_encoding('Комментарий заказа', 'windows-1251', 'utf-8')
                ], ";");

                foreach ($reserves_places as $item) {
                    fputcsv($FH, [
                        mb_convert_encoding($item->order->id, 'windows-1251', 'utf-8'),
                        mb_convert_encoding($item->f .' '. $item->i .' '. $item->o, 'windows-1251', 'utf-8'),
                        mb_convert_encoding($item->dr, 'windows-1251', 'utf-8'),
                        mb_convert_encoding($item->phone, 'windows-1251', 'utf-8'),
                        mb_convert_encoding($item->doc_n, 'windows-1251', 'utf-8'),
                        mb_convert_encoding((($item->order->user->role === 'agent')?"(Агент) ".$item->order->user->agency:"Мир туризма"), 'windows-1251', 'utf-8'),
                        mb_convert_encoding((($item->order->hotel)?$item->order->hotel->name:"Проезд"), 'windows-1251', 'utf-8'),
                        mb_convert_encoding($item->order->punkt, 'windows-1251', 'utf-8'),
                        mb_convert_encoding($item->comment, 'windows-1251', 'utf-8'),
                        mb_convert_encoding(($item->order->comment === "Заказ зарегистрирован")?"":$item->order->comment, 'windows-1251', 'utf-8')
                    ],";");
                }

                fclose($FH);
        };

        return response()->stream($callback, 200, $headers);

    }
}
