<?php

namespace App\Filters;

class OrderFilter extends QueryFilter {


    public function punkt($punkt) {
        if (!empty($punkt))
            $this->builder->where("punkt",  $punkt);
    }

    public function reis_id($reis_id) {
        if (!empty($reis_id))
            $this->builder->where("reis_id",  $reis_id);
    }

    public function serch($serch) {
        if (!empty($serch))
            $this->builder->whereHas('mesta', function ($query) use ($serch) {
                $query->where('f', "LIKE", "%".$serch."%")
                        ->orWhere('i', "LIKE", "%".$serch."%")
                        ->orWhere('o', "LIKE", "%".$serch."%")
                        ->orWhere('phone', "LIKE", "%".$serch."%")
                        ->orWhere('comment', "LIKE", "%".$serch."%");
            });
    }

    public function only_agency($only_agency) {
        if (!empty($only_agency))
            $this->builder->whereHas('user', function ($query) use ($only_agency) {
                $query->where('role',  'agent');
            });
    }
}
