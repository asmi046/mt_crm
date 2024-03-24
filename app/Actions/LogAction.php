<?php

namespace App\Actions;

use App\Models\Log;
use App\Actions\TelegramSendAction;

class LogAction {
    public function handle($event, $text) {
        Log::create(
            [
                "event" => $event,
                "user_id" => auth()->user()->id,
                "info" => $text,
            ]
        );

        $text = "<b>ЛОГ</b>\n\r<b>Событие: </b>".$event."\n\r<b>Пользователь: </b>". auth()->user()->name ."(". auth()->user()->agency .")". " \n\r<b>Информация: </b>\n\r".$text;
        $tgsender = new TelegramSendAction();
        $tmp = $tgsender->handle($text);
    }
}
