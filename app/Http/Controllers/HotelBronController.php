<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hotel;

class HotelBronController extends Controller
{
    public function index(Request $request) {
        $sel_city = $request->get('city');

        if ($sel_city == "" || $sel_city == "%")
            $hotels = Hotel::all();
        else
            $hotels = Hotel::where('city', $sel_city)->get();

        $citys = Hotel::select('city')->groupBy('city')->get();
        return view('hotel-bron', ['hotels' => $hotels, 'citys' => $citys, 'selcity'=>$sel_city]);
    }
}
