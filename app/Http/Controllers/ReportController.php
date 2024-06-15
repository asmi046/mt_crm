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
        ]);
    }
}
