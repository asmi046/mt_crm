<?php

namespace App\Actions;

class UserRegisterMessageGetAction {
    public function handle($item) {
        $message = "";

        $message .= "<b>Зарегистрирован новый пользователь:</b>\n\r";
        $message .= "<b>Имя:</b> ".$item->name."\n\r";
        $message .= "<b>Агентство:</b> ".$item->agency."\n\r";
        $message .= "<b>e-mail:</b> ".$item->email."\n\r";
        $message .= "<b>Телефон:</b> ".$item->phone."\n\r";

        return $message;
    }
}
