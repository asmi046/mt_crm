<?php

namespace App\Actions;

class PlaceEditMessageGetAction {
    public function handle($place) {
        $message = "";

        $message .= "<b>Отредактировано место</b>\n\r";
        $message .= "<b>№ места:</b> ".$place->number."\n\r";
        $message .= "<b>№ заказа:</b> ".$place->order_id."\n\r";
        $message .= "<b>Рейс: </b>".
        "№". $place->reis->id ." ".date("d.m.Y", strtotime($place->reis->start_to_date))." ".date("d.m.Y", strtotime($place->reis->start_to_date))
        ." ".$place->reis->direction->start_punkt." ".$place->reis->direction->end_punkt."\n\r";

        $message .= "<b>Пункт следования: </b>".$place->punkt."\n\r";
        $message .= "<b>Направление: </b>".$place->direction_text."\n\r";
        $message .= "<b>Пасажир: </b>".$place->f." ".$place->i." ".$place->o."\n\r";
        $message .= "<b>Документ: </b>".$place->doc_type."\n\r";
        $message .= "<b>№ документа: </b>".$place->doc_n."\n\r";
        $message .= "<b>Дата рождения: </b>".date("d.m.Y", strtotime($place->dr))."\n\r";
        $message .= "<b>Телефон: </b>".$place->phone."\n\r\n\r";

        $message .= "<b>Изменения внес:</b>\n\r";
        $message .= auth()->user()->name." (".auth()->user()->agency.")\n\r\n\r";

        $message .= "<b>Комментарий: </b>".$place->comment."\n\r";

        return $message;
    }
}
