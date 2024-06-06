<?php

namespace App\Filters;

class LogFilter extends QueryFilter {


    public function event($event) {
        if (!empty($event))
            $this->builder->where("event",  $event);
    }


    public function user($user) {
        if (!empty($user))
            $this->builder->whereHas('user', function ($query) use ($user) {
                $query->where('id',  $user);
            });
    }


    public function serch($serch) {
        if (!empty($serch))
            $this->builder->where('info', "LIKE", "%".$serch."%");

    }

    public function date_start($date_start) {
        if (!empty($date_start))
            $this->builder->where("created_at", ">=",  $date_start);
    }

    public function date_finish($date_finish) {
        if (!empty($date_finish))
            $this->builder->where("created_at", "<=",  date("Y-m-d", strtotime($date_finish." +1 day")));
    }

    public function reis($reis) {
        if (!empty($reis))
            $this->builder->where("reis_id",   $reis);
    }

    public function place($place) {
        if (!empty($place))
            $this->builder->where("place_number",   $place);
    }

    public function bron($bron) {
        if (!empty($bron))
            $this->builder->where("order_id",  $bron);
    }

}
