<?php

namespace App\Http\Controllers;

use App\Models\Order;

use App\Actions\LogAction;
use App\Mail\Order\HotelSet;
use Illuminate\Http\Request;
use App\Mail\Order\OrderMail;

use App\Services\PlacesServices;
use App\Services\LogDataServices;
use App\Actions\TelegramSendAction;
use App\Http\Requests\OrderRequest;
use App\Mail\Order\DeleteOrderMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Actions\OrderMessageGetAction;
use App\Actions\OrderDeleteMessageGetAction;

class OrderController extends Controller
{
    public function create_order(OrderRequest $request, LogAction $log) {
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
        $tg_msg = $message_get->handle($order);
        $tmp = $tgsender->handle($tg_msg);

        $log->handle("Создана бронь", $tg_msg,
            field_id: $order->id,
            order_id: $order->id,
            reis_id: $order->reis->id
        );

        if (auth()->user()->role === 'agent') {
            Mail::to(get_send_adress())->send(new OrderMail($order));
        }

        return [
            "order" => $order,
            "message" => "Забронировано"
        ];
    }

    public function get_reserved($id) {
        $place_service = new PlacesServices();
        return $place_service->get_reserved_places($id);
    }

    public function add_place(Request $request) {
        $place_service = new PlacesServices();
        $data = $request->all();

        if (
            !$place_service->chec_reserved_places($data['tuda'], 't', $data['reis_id']) || !$place_service->chec_reserved_places($data['obratno'], 'o', $data['reis_id'])
        )
        return [
            "order" => null,
            "message" => "Одно из мест уже занято обновите страницу и выберите новые места"
        ];

        $place_service->rezerv_places($data['tuda'], $data['order_id'], $data['reis_id'], $data['punkt'], 't', "Курск - ".$data['punkt']);
        $place_service->rezerv_places($data['obratno'], $data['order_id'], $data['reis_id'], $data['punkt'], 'o', $data['punkt']." - Курск");

        return [
            "message" => "Места добавлены"
        ];
    }

    public function delete_order($id) {
        $order = Order::where('id', $id)->first();

        $tgsender = new TelegramSendAction();
        $message_get = new OrderDeleteMessageGetAction();
        $tg_msg = $message_get->handle($order);
        $tmp = $tgsender->handle($tg_msg);

        Mail::to(get_send_adress())->send(new DeleteOrderMail($order));

        $log = new LogAction();
        $log->handle("Удалена бронь", $tg_msg,
            field_id: $order->id,
            order_id: $order->id,
            reis_id: $order->reis->id
        );

        $order->delete();

        return redirect()->route('proezd-bron');
    }

    public function save_order(OrderRequest $request, int $id) {
        $data = $request->validated();

        $order = Order::where('id', $id)->first();

        $old_order = clone $order;
        $order->update($data);
        $order->save();

        $log = new LogAction();
        $log_data = new LogDataServices();

        $log->handle("Обновлена информация о брони", $log_data->create_order_update_data($order, $old_order),
            field_id: $id,
            order_id: $id,
            reis_id: $order->reis->id,
        );

        $order = Order::where('id', $id)->first();
        if ($order->hotel && !$old_order->hotel)
            Mail::to(get_send_adress())->send(new HotelSet($order));

        return redirect()->route('order-edit', $id)->with('success_order', 'Данные заказа сохранены');
    }
}
