<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Http\Requests\PlaceFormRequest;


class PlaceController extends Controller
{
    public function place_edit(PlaceFormRequest $request, int $id) {
        $data = $request->validated();

        $order_id = $request->input('order_id');

        $place = Place::where('id', $id)->first();

        $place->update($data);

        return redirect()->route('order-edit', $order_id)
            ->with('success_user', 'Данные пользователя сохранены')
            ->with('success_user_id', $id);
    }

    public function place_delete(int $id) {
        $place = Place::where('id', $id)->first();
        $order_id = $place->order_id;
        $place->delete();

        return redirect()->route('order-edit', $order_id)->with('success_user', 'Место удалено!');
    }
}
