<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Direction;
use App\Models\Reis;

class ProezdBronController extends Controller
{
    public function index($direction=null, $punct=null) {
        $all_direction = Direction::with('puncts', 'reises')->get();
        $all_reis = Reis::where("direction_id", 'LIKE', empty($direction)?"%":$direction)->get();
        return view('proezd-bron', [
            'direction' => $all_direction,
            'reises' => $all_reis,
            'sel_p' => $punct,
            'sel_d' => $direction
        ]);
    }
}
