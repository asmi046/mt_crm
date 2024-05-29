<?php

namespace App\Actions;

class OrderAcceptMessageGetAction {
    public function handle($order, $action = "Создана") {
        $message = "";

        $message .= "<b>".$action." бронь".((auth()->user()->role === "agent")?" (Агент)":"")."</b>\n\r";
        $message .= "<b>Пользователь: </b>".$order->user->name." (".$order->user->agency.")\n\r";
        $message .= "<b>Рейс: </b>".
        "№". $order->reis->id ." ".date("d.m.Y", strtotime($order->reis->start_to_date))." ".date("d.m.Y", strtotime($order->reis->start_to_date))
        ." ".$order->reis->direction->start_punkt." ".$order->reis->direction->end_punkt."\n\r";
        $message .= "<b>Пункт следования: </b>".$order->punkt."\n\r";
        $message .= "<b>Комментарий: </b>".$order->comment."\n\r\n\r";
        $message .= "<b>Места: </b>\n\r";

        foreach ($order->mesta as $item){
            $message .= "№ ".$item->number." ".$item->direction_text."\n\r";

            $message .= "<b>Пасажир: </b>".$item->f." ".$item->i." ".$item->o."\n\r";
            $message .= "<b>Документ: </b>".$item->doc_type."\n\r";
            $message .= "<b>№ документа: </b>".$item->doc_n."\n\r";
            $message .= "<b>Дата рождения: </b>".date("d.m.Y", strtotime($item->dr))."\n\r";
            $message .= "<b>Телефон: </b>".$item->phone."\n\r\n\r";

            $message .= "<b>Комментарий: </b>".$item->comment."\n\r";

            $message .= "\n\r";
        }

        return $message;
    }
}
