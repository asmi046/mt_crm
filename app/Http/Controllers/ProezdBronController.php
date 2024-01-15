<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Direction;

class ProezdBronController extends Controller
{
    public function index($direction=null, $punct=null) {
        $all_direction = Direction::with('puncts', 'reises')->get();
        return view('proezd-bron', ['direction' => $all_direction, 'sel_p' => $punct,  'sel_d' => $direction]);
    }
}
