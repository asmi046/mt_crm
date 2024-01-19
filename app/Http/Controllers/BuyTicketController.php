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

        return view('buy-ticket', ['reis' => $reis, 'punkt' => $punkt]);
    }
}
