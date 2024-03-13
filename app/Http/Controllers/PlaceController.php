<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Mail\Place\PlaceMail;
use App\Actions\TelegramSendAction;
use App\Mail\Place\DeletePlaceMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PlaceFormRequest;
use App\Actions\PlaceEditMessageGetAction;
use App\Actions\PlaceDeleteMessageGetAction;


class PlaceController extends Controller
{
    public function place_edit(PlaceFormRequest $request, int $id) {
        $data = $request->validated();

        $order_id = $request->input('order_id');

        $place = Place::where('id', $id)->first();

        $place->update($data);


        $tgsender = new TelegramSendAction();
        $message_get = new PlaceEditMessageGetAction();
        $tmp = $tgsender->handle($message_get->handle($place));

        Mail::to(explode(",",config('consultation.mailadresat')))->send(new PlaceMail($place));


        return redirect()->route('order-edit', $order_id)
            ->with('success_user', 'Данные пользователя сохранены')
            ->with('success_user_id', $id);
    }

    public function place_delete(int $id) {
        $place = Place::where('id', $id)->first();
        $order_id = $place->order_id;

        $tgsender = new TelegramSendAction();
        $message_get = new PlaceDeleteMessageGetAction();
        $tmp = $tgsender->handle($message_get->handle($place));

        Mail::to(explode(",",config('consultation.mailadresat')))->send(new DeletePlaceMail($place));


        $place->delete();

        return redirect()->route('order-edit', $order_id)->with('success_user', 'Место удалено!');
    }
}
