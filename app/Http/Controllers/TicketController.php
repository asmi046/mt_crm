<?php

namespace App\Http\Controllers;

use App\Models\Reis;

use App\Models\Order;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index($reis, $punkt="") {
        $reis = Reis::where('id', $reis)->first();

        if (empty($punkt))
            $punkt = $reis->direction->end_punkt;

        $schema = buss_schemm($reis->reis_bus->schema);
        return view('select-places', ['reis' => $reis, 'punkt' => $punkt, "schema" => $schema ]);
    }

    public function edit_order(int $id) {
        $order = Order::where('id', $id)->first();

        return view('order-edit', ['order' => $order]);
    }
}
