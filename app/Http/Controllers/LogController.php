<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Filters\LogFilter;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(LogFilter $request) {
        $filter = Log::all();

        $filter_setings = [
            'event' => [],
            'user' => [],
        ];

        foreach ($filter as $item) {
            $filter_setings['event'][$item->event] = 1;

            if ($item->user)
                $filter_setings['user'][$item->user->id] = $item->user->agency."(".$item->user->name.")";
        }

        $log = Log::filter($request)->paginate(15)->withQueryString();
        return view('show_log',[
            'log' => $log,
            'filter_settings' => $filter_setings
        ]);
    }

    public function detail($id) {
        $item = Log::where('id', $id)->first();

        if (!$item) abort('404');

        return view('show_log_detail',[
            'item' => $item
        ]);
    }
}
