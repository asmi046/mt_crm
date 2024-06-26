<?php

if (!function_exists("order_table_text")) {
    function order_table_text($order) {
        return "№".$order->id." ".$order->punkt." ".count($order->mesta)." места";
    }
}

if (!function_exists("reis_table_text")) {
    function reis_table_text($reis) {
        return  "№". $reis->id." ".$reis->direction->start_punkt." - ".$reis->direction->end_punkt." (".date("d.m.Y", strtotime($reis->start_to_date))." ".date("d.m.Y", strtotime($reis->start_to_date))
        .")";
    }
}

if (!function_exists("get_send_adress")) {
    function get_send_adress() {
        $adr_list = explode(",",config('consultation.mailadresat'));

        if (auth()->user()->role === 'agent') {
            $adr_list[] = auth()->user()->email;
        }
        return $adr_list;
    }
}

if (!function_exists("buss_schemm")) {
    function buss_schemm(string $schem_name) {
        $all_buss = [
            "bus_18" => [
                2,1,-1,5,4,3,8,7,6,11,10,9,14,13,12,
                18,17,16,15
            ],

            "bus_49" => [
                [2, 1, -1, 3, 4],
                [6, 5, -1, 7, 8],
                [10, 9, -1, 11, 12],
                [14, 13, -1, 15, 16],
                [18, 17, -1, 19, 20],
                [22, 21, -1, -1, -1],
                [24, 23, -1, -1, -1],
                [28, 27, -1, 25, 26],
                [32, 31, -1, 29, 30],
                [36, 35, -1, 33, 34],
                [40, 39, -1, 37, 38],
                [44, 43, -1, 41, 42],
                [49, 48, 47, 46, 45]
            ],

            "bus_53" => [
                [1, 2, -1, 3, 4],
				[5, 6, -1, 7, 8],
				[9, 10, -1, 11, 12],
				[13, 14, -1, 15, 16],
				[17, 18, -1, 19, 20],
				[21, 22, -1, 23, 24],
				[25, 26, -1, -1, -1],
				[27, 28, -1, -1, -1],
				[31, 32, -1, 29, 30],
				[35, 36, -1, 33, 34],
				[39, 40, -1, 37, 38],
				[43, 44, -1, 41, 42],
				[47, 48, -1, 45, 46],
				[51, 52, 53, 49, 50]
            ],
        ];

        if (isset($all_buss[$schem_name]))
            return $all_buss[$schem_name];
        else
            return [];
    }
}

// Форматирование номера телефона

if (!function_exists("phone_format")) {
    function phone_format($phone)
    {
        $phone = trim($phone);

        $res = preg_replace(
            array(
                '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{3})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?(\d{3})[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{3})/',
                '/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{3})[-|\s]?(\d{3})/',
            ),
            array(
                '$2$3$4$5',
                '$2$3$4$5',
                '$2$3$4$5',
                '$2$3$4$5',
                '$2$3$4',
                '$2$3$4',
            ),
            $phone
        );

        return $res;
    }
}
