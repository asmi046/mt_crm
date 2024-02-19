<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reis;

class BuyTicketController extends Controller
{
    public function index($reis, $punkt="") {
        $reis = Reis::where('id', $reis)->first();

        if (empty($punkt))
            $punkt = $reis->direction->end_punkt;

        $schema = buss_schemm($reis->reis_bus->schema);
        return view('buy-ticket', ['reis' => $reis, 'punkt' => $punkt, "schema" => $schema ]);
    }
}
