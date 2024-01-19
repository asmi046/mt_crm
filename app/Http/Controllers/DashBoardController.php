<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Direction;
use App\Models\Reis;

use Illuminate\Support\Carbon;

class DashBoardController extends Controller
{
    public function index() {

        $direction_count = Direction::count();
        $reis_count = Reis::count();
        $actual_reis_count = Reis::where('start_out_date', ">", Carbon::today())->count();

        return view('dash-board', [
            "direction_count" => $direction_count,
            "reis_count" => $reis_count,
            "actual_reis_count" => $actual_reis_count,
        ]);
    }
}
