<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Direction;

class ProezdBronController extends Controller
{
    public function index() {
        $all_direction = Direction::with('puncts')->get();
        return view('proezd-bron', ['direction' => $all_direction]);
    }
}
