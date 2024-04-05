<?php

namespace App\Filters;

class UserFilter extends QueryFilter {

    public function search($search) {
        if (!empty($search))
            $this->builder
                ->where("name", "LIKE", "%".$search."%")
                ->orWhere("agency", "LIKE", "%".$search."%")
                ->orWhere("phone", "LIKE", "%".$search."%");
    }

}
