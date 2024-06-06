<?php

namespace App\Services;

use App\Models\Place;

class LogDataServices {

    public function create_order_update_data($new_data, $old_data) {
        $str = "Обновлена информация о брони: ".$old_data->id."<br>";
        $str .= "<h3>Старая информация:</h3>";
        $str .= "<strong>Проживание в отеле (id):</strong>".$old_data->hotel_id."<br>";
        $str .= "<strong>Пункт прибытия:</strong>".$old_data->punkt."<br>";
        $str .= "<strong>Цена:</strong>".$old_data->price."<br>";
        $str .= "<strong>Аванс:</strong>".$old_data->avanc."<br>";
        $str .= "<strong>Комментарий:</strong>".$old_data->comment."<br>";

        $str .= "<h3>Новая информация:</h3>";
        $str .= "<strong>Проживание в отеле (id):</strong>".$new_data->hotel_id."<br>";
        $str .= "<strong>Пункт прибытия:</strong>".$new_data->punkt."<br>";
        $str .= "<strong>Цена:</strong>".$new_data->price."<br>";
        $str .= "<strong>Аванс:</strong>".$new_data->avanc."<br>";
        $str .= "<strong>Комментарий:</strong>".$new_data->comment."<br>";

        return $str;
    }

    public function create_place_update_data($new_data, $old_data) {
        $str = "Обновлено место: ".$new_data->number." <br>";
        $str .= "<h3>Старая информация:</h3>";
        $str .= "<strong>Бронь:</strong>".$old_data->order_id."<br>";
        $str .= "<strong>Рейс:</strong>".
        "№". $old_data->reis->id ." ".date("d.m.Y", strtotime($old_data->reis->start_to_date))." ".date("d.m.Y", strtotime($old_data->reis->start_to_date))
        ." ".$old_data->reis->direction->start_punkt." ".$old_data->reis->direction->end_punkt."<br>";
        $str .= "<strong>Пункт прибытия:</strong>".$old_data->punkt."<br>";
        $str .= "<strong>Направление:</strong>".$old_data->direction_text."<br>";
        $str .= "<strong>Пасажир:</strong>".$old_data->f." ".$old_data->i." ".$old_data->o."<br>";
        $str .= "<strong>Документ:</strong>".$old_data->doc_type."<br>";
        $str .= "<strong>№ документа:</strong>".$old_data->doc_n."<br>";
        $str .= "<strong>Дата рождения:</strong>".date("d.m.Y", strtotime($old_data->dr))."<br>";
        $str .= "<strong>Телефон:</strong>".$old_data->phone."<br>";
        $str .= "<strong>Комментарий:</strong>".$old_data->comment."<br>";

        $str .= "<h3>Новая информация:</h3>";

        $str .= "<strong>Бронь:</strong>".$new_data->order_id."<br>";
        $str .= "<strong>Рейс:</strong>".
        "№". $new_data->reis->id ." ".date("d.m.Y", strtotime($new_data->reis->start_to_date))." ".date("d.m.Y", strtotime($new_data->reis->start_to_date))
        ." ".$new_data->reis->direction->start_punkt." ".$new_data->reis->direction->end_punkt."<br>";
        $str .= "<strong>Пункт прибытия:</strong>".$new_data->punkt."<br>";
        $str .= "<strong>Направление:</strong>".$new_data->direction_text."<br>";
        $str .= "<strong>Пасажир:</strong>".$new_data->f." ".$new_data->i." ".$new_data->o."<br>";
        $str .= "<strong>Документ:</strong>".$new_data->doc_type."<br>";
        $str .= "<strong>№ документа:</strong>".$new_data->doc_n."<br>";
        $str .= "<strong>Дата рождения:</strong>".date("d.m.Y", strtotime($new_data->dr))."<br>";
        $str .= "<strong>Телефон:</strong>".$new_data->phone."<br>";
        $str .= "<strong>Комментарий:</strong>".$new_data->comment."<br>";

        return $str;
    }

}
