<?php

namespace App\Http\Controllers;

use App\Models\Reis;

use App\Models\Place;
use App\Models\Direction;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashBoardController extends Controller
{
    public function index() {

        $place_count = Place::count();
        $reis_count = Reis::count();
        $actual_reis_count = Reis::where('start_out_date', ">", Carbon::today())->count();


        return view('dash-board', [
            "place_count" => $place_count,
            "reis_count" => $reis_count,
            "actual_reis_count" => $actual_reis_count,
        ]);
    }
}
