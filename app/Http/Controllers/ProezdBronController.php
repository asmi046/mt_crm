<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProezdBronController extends Controller
{
    public function index() {
        return view('proezd-bron');
    }
}
