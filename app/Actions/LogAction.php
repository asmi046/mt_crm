<?php

namespace App\Actions;

use App\Models\Log;
use App\Actions\TelegramSendAction;

class LogAction {
    public function handle($event, $text, $user=null,
                        $field_id=null,
                        $place_number=null,
                        $order_id=null,
                        $reis_id=null,
    ) {
        Log::create(
            [
                "event" => $event,
                "user_id" => empty($user)?auth()->user()->id:$user->id,
                "info" => $text,

                "field_id" => $field_id,
                "place_number" => $place_number,
                "order_id" => $order_id,
                "reis_id" => $reis_id,
            ]
        );

        if (empty($user))
            $text = "<b>ЛОГ</b>\n\r<b>Событие: </b>".$event."\n\r<b>Пользователь: </b>". auth()->user()->name ."(". auth()->user()->agency .")". " \n\r<b>Информация: </b>\n\r".$text;
        else
            $text = "<b>ЛОГ</b>\n\r<b>Событие: </b>".$event."\n\r<b>Пользователь: </b>". $user->name ."(". $user->agency .")". " \n\r<b>Информация: </b>\n\r".$text;
        $tgsender = new TelegramSendAction();
        $tmp = $tgsender->handle($text);
    }
}
