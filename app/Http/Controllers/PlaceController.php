<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Actions\LogAction;
use Illuminate\Http\Request;
use App\Mail\Place\PlaceMail;
use App\Services\PlacesServices;
use App\Services\LogDataServices;
use App\Actions\TelegramSendAction;
use App\Mail\Order\OrderAcceptMail;
use App\Mail\Place\DeletePlaceMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PlaceFormRequest;
use App\Actions\PlaceEditMessageGetAction;
use App\Actions\OrderAcceptMessageGetAction;
use App\Actions\PlaceDeleteMessageGetAction;


class PlaceController extends Controller
{
    public function place_edit(PlaceFormRequest $request, int $id, PlacesServices $place_services, LogAction $log) {
        $data = $request->validated();

        $order_id = $request->input('order_id');

        $place = Place::where('id', $id)->first();

        $fill_before_update = $place_services->all_place_in_order_fill($place->order);

        $place_old = clone $place;
        $place->update($data);

        $fill_after_update = $place_services->all_place_in_order_fill($place->order()->first());

        // dump($fill_before_update, $fill_after_update);

        if (!$fill_before_update && $fill_after_update) {
            $filled_order = $place->order()->first();
            $tgsender = new TelegramSendAction();
            $message_get = new OrderAcceptMessageGetAction();
            $tg_msg = $message_get->handle($filled_order);
            $tmp = $tgsender->handle($tg_msg);

            $log->handle("Оформлена бронь", $tg_msg,
                field_id: $order_id,
                order_id: $order_id,
                reis_id: $place->reis->id,
            );

            Mail::to(get_send_adress())->send(new OrderAcceptMail($filled_order));
        }

        if ($fill_before_update && $fill_after_update) {
            $tgsender = new TelegramSendAction();
            $message_get = new PlaceEditMessageGetAction();
            $msg_t = $message_get->handle($place);
            $tmp = $tgsender->handle($msg_t);

            Mail::to(get_send_adress())->send(new PlaceMail($place));
        }



        $log = new LogAction();
        $log_data = new LogDataServices();
        $log->handle("Обновлено место", $log_data->create_place_update_data($place, $place_old),
            field_id: $id,
            place_number: $place->number,
            order_id: $place->order_id,
            reis_id: $place->reis_id,
        );


        return redirect()->route('order-edit', $order_id)
            ->with('success_user', 'Данные пользователя сохранены')
            ->with('success_user_id', $id);
    }

    public function place_replace(Request $request) {
        $palce_id = $request->input('place_id');
        $palce_new_number = $request->input('palce_new_number');

        $palce = Place::where('id', $palce_id)->first();

        if (!$palce) abort(403,"Не найдено место для пересадки");

        $palce->update([
            'number' => $palce_new_number
        ]);
    }

    public function place_delete(int $id) {
        $place = Place::where('id', $id)->first();
        $order_id = $place->order_id;

        $tgsender = new TelegramSendAction();
        $message_get = new PlaceDeleteMessageGetAction();
        $msg_t = $message_get->handle($place);
        $tmp = $tgsender->handle($msg_t);

        $log = new LogAction();
        $log->handle("Удалено место", $msg_t,
            field_id: $id,
            place_number: $place->number,
            order_id: $place->order_id,
            reis_id: $place->reis_id,
        );

        Mail::to(get_send_adress())->send(new DeletePlaceMail($place));


        $place->delete();

        return redirect()->route('order-edit', $order_id)->with('success_user', 'Место удалено!');
    }
}
