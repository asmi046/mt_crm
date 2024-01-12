<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelBronController extends Controller
{
    public function index() {
        return view('hotel-bron');
    }
}
