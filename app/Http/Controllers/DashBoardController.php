<?php

namespace App\Http\Controllers;

use App\Models\Reis;

use App\Models\Order;
use App\Models\Place;

use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashBoardController extends Controller
{
    protected function get_mesta_stat($places) {
        $count = 0;
        foreach ($places as $item)
            $count += ($item->direction === 't')?1:0;

        return $count;
    }

    public function index() {

        $place_count = Place::count();
        $reis_count = Reis::count();
        $actual_reis_count = Reis::where('start_out_date', ">", Carbon::today())->count();

        $zagruzka = [];
        $reis = Reis::all();
        $order = Order::all();

        foreach ($reis as $item)
            $zagruzka[$item->direction->name][date("d.m.Y", strtotime($item->start_to_date)). " - ".date("d.m.Y", strtotime($item->prib_out_date))] = 0;

        foreach ($order as $item)
            $zagruzka[$item->reis->direction->name][date("d.m.Y", strtotime($item->reis->start_to_date)). " - ".date("d.m.Y", strtotime($item->reis->prib_out_date))] =
            $zagruzka[$item->reis->direction->name][date("d.m.Y", strtotime($item->reis->start_to_date)). " - ".date("d.m.Y", strtotime($item->reis->prib_out_date))] + $this->get_mesta_stat($item->mesta);

        $total_sum = Order::all()->sum('price');
        $avanc_sum = Order::all()->sum('avanc');

        return view('dash-board', [
            "place_count" => $place_count,
            "reis_count" => $reis_count,
            "actual_reis_count" => $actual_reis_count,
            "zagruzka" => $zagruzka,
            "many" => [
                'total_sum' => $total_sum,
                'avanc_sum' => $avanc_sum,
            ]
        ]);
    }
}
