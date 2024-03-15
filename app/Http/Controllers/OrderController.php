<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;
use App\Mail\Order\OrderMail;
use App\Services\PlacesServices;
use App\Actions\TelegramSendAction;

use App\Http\Requests\OrderRequest;
use App\Mail\Order\DeleteOrderMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Actions\OrderMessageGetAction;
use App\Actions\OrderDeleteMessageGetAction;

class OrderController extends Controller
{
    public function create_order(OrderRequest $request) {
        $place_service = new PlacesServices();
        $data = $request->validated();

        if (
            !$place_service->chec_reserved_places($data['tuda'], 't', $data['reis_id']) || !$place_service->chec_reserved_places($data['obratno'], 'o', $data['reis_id'])
        )
        return [
            "order" => null,
            "message" => "Одно из мест уже занято обновите страницу и выберите новые места"
        ];


        $data['user_id'] = Auth::user()->id;
        $order = Order::create($data);

        $tmp = $place_service->rezerv_places($data['tuda'], $order->id, $data['reis_id'], $data['punkt'], 't', "Курск - ".$data['punkt']);
        $place_service->rezerv_places($data['obratno'], $order->id, $data['reis_id'], $data['punkt'], 'o', $data['punkt']." - Курск");

        $tgsender = new TelegramSendAction();
        $message_get = new OrderMessageGetAction();
        $tmp = $tgsender->handle($message_get->handle($order));

        Mail::to(explode(",",config('consultation.mailadresat')))->send(new OrderMail($order));

        return [
            "order" => $order,
            "message" => "Забронировано"
        ];
    }

    public function delete_order($id) {
        $order = Order::where('id', $id)->first();
        $tgsender = new TelegramSendAction();
        $message_get = new OrderDeleteMessageGetAction();
        $tmp = $tgsender->handle($message_get->handle($order));
        Mail::to(explode(",",config('consultation.mailadresat')))->send(new DeleteOrderMail($order));
        $order->delete();
        return redirect()->route('all_orders');
    }

    public function save_order(OrderRequest $request, int $id) {
        $data = $request->validated();

        $order = Order::where('id', $id)->first();


        $order->update($data);
        // dd($data,$order);

        return redirect()->route('order-edit', $id)->with('success_order', 'Данные заказа сохранены');
    }
}
