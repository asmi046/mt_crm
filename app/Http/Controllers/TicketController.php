<?php

namespace App\Http\Controllers;

use App\Models\Reis;

use App\Models\Hotel;
use App\Models\Order;
use App\Filters\OrderFilter;
use Illuminate\Http\Request;
use App\Services\PlacesServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TicketController extends Controller
{
    public function index($reis, $punkt="") {
        $reis = Reis::where('id', $reis)->first();

        if (empty($punkt))
            $punkt = $reis->direction->end_punkt;

        $schema = buss_schemm($reis->reis_bus->schema);

        $place_service = new PlacesServices();
        $reserves_places = $place_service->get_reserved_places($reis->id);

        // dd($reserves_places);

        return view('select-places', [
            'reis' => $reis,
            'punkt' => $punkt,
            'reserved_t' => $reserves_places['t'],
            'reserved_o' => $reserves_places['o'],
            "schema" => $schema
        ]);
    }


    public function add_places($reis, $order) {
        $reis = Reis::where('id', $reis)->first();
        $order = Order::where('id', $order)->first();
        $punkt = $order->punkt;

        $schema = buss_schemm($reis->reis_bus->schema);

        $place_service = new PlacesServices();
        $reserves_places = $place_service->get_reserved_places($reis->id);

        // dd($reserves_places);

        return view('add-places-to-order', [
            'reis' => $reis,
            'order' => $order,
            'punkt' => $punkt,
            'reserved_t' => $reserves_places['t'],
            'reserved_o' => $reserves_places['o'],
            "schema" => $schema
        ]);

    }

    public function order_edit(int $id) {
        $order = Order::where('id', $id)->first();
        if ($order->punkt)
            $hotels = Hotel::where('city', $order->punkt)->get();

        return view('order-edit', ['order' => $order, 'hotels' => $hotels]);
    }

    public function all_orders(OrderFilter $request) {
        $user_id = Auth::user()->id;

        if (Gate::allows('get_all_orders')) {
            $filter = Order::all();
            $all_user_order =  Order::select()
                    ->filter($request)
                    ->get();
        } else {
            $filter = Order::where('user_id', $user_id)->get();
            $all_user_order =  Order::where('user_id', $user_id)
                    ->filter($request)
                    ->get();
        }



        $filter_setings = [
            'punkt' => [],
            'reis' => [],
        ];

        foreach ($filter as $item) {
            $filter_setings['punkt'][$item->punkt] = 1;
            $filter_setings['reis'][$item->reis_id] = "№".$item->reis->id." ".date("d.m.Y", strtotime($item->reis->start_to_date))." ".$item->reis->direction->start_punkt." - ".$item->reis->direction->end_punkt;
        }
        // dd($filter_setings);
        return view('user-orders', ['all_order' => $all_user_order, 'filter_settings' => $filter_setings]);
    }
}
