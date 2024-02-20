<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function create_order(OrderRequest $request) {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $order = Order::create($data);
        return [
            "order" => $order,
            "tuda" => $data['tuda'],
            "count"=>count($data['tuda'])+count($data['obratno'])];
    }

    public function delete_order($id) {

    }
}
