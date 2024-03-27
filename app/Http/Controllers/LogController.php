<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index() {
        $log = Log::paginate(15);
        return view('show_log',['log' => $log]);
    }
}
