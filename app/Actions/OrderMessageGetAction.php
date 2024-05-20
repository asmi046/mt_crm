<?php

namespace App\Actions;

class OrderMessageGetAction {
    public function handle($order, $action = "Создана") {
        $message = "";

        $message .= "<b>".$action." бронь</b>\n\r";
        $message .= "<b>Пользователь: </b>".$order->user->name." (".$order->user->agency.")\n\r";
        $message .= "<b>Рейс: </b>".
        "№". $order->reis->id ." ".date("d.m.Y", strtotime($order->reis->start_to_date))." ".date("d.m.Y", strtotime($order->reis->start_to_date))
        ." ".$order->reis->direction->start_punkt." ".$order->reis->direction->end_punkt."\n\r";
        $message .= "<b>Пункт следования: </b>".$order->punkt."\n\r";
        $message .= "<b>Комментарий: </b>".$order->comment."\n\r\n\r";
        $message .= "<b>Места: </b>\n\r";

        foreach ($order->mesta as $item){
            $direction = ($item->direction === "t")?"Туда":"Обратно";
            $message .= "№ ".$item->number." ".$direction;
            $message .= "\n\r";
        }

        return $message;
    }
}
