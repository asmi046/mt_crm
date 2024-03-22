<?php

namespace App\Services;

use App\Models\Place;

class PlacesServices {

    public function get_reserved_places(int $reis_id) {
        $all_places = Place::where('reis_id', $reis_id)->get();

        $returned_data = [
            't' => [],
            'o' => [],
        ];
        foreach ($all_places as $item)
        {
            // $returned_data[$item->direction][] = $item->number;
            $returned_data[$item->direction][$item->number] = $item;
        }

        return $returned_data;
    }

    public function chec_reserved_places(array $places, string $direction, int $reis_id) :bool {
        if ( empty($places) ) return true;

        $places = Place::where('direction', $direction)->where('reis_id', $reis_id)->whereIn('number', $places)->get();

        if (count($places) > 0)
            return false;
        else
            return true;
    }

    public function rezerv_places(array $places, int $order_id, int $reis_id, string $punkt, string $direction, string $direction_text) {
        $add_data = [];
        foreach ($places as $item) {
            $tmp = [
                'number' => $item,
                'reis_id' => $reis_id,
                'order_id' => $order_id,
                'punkt' => $punkt,
                'direction' => $direction,
                'direction_text' => $direction_text,
            ];

            $add_data[] = $tmp;
        }

        // return $add_data;

        Place::insert($add_data);

    }

}
