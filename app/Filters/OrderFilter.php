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

    public function f($f) {
        if (!empty($f))
            $this->builder->whereHas('mesta', function ($query) use ($f) {
                $query->where("f", "LIKE", "%".$f."%");
            });
    }

    public function i($i) {
        if (!empty($i))
            $this->builder->whereHas('mesta', function ($query) use ($i) {
                $query->where("i", "LIKE", "%".$i."%");
            });
    }

    public function o($o) {
        if (!empty($o))
            $this->builder->whereHas('mesta', function ($query) use ($o) {
                $query->where("o", "LIKE", "%".$o."%");
            });
    }



    public function serch($serch) {
        if (!empty($serch))
            $this->builder->whereHas('mesta', function ($query) use ($serch) {
                $query->where('phone', "LIKE", "%".$serch."%")
                        ->orWhere('comment', "LIKE", "%".$serch."%")
                        ->orWhere('doc_n', "LIKE", "%".$serch."%");
            });
    }

    public function only_agency($only_agency) {
        if (!empty($only_agency))
            $this->builder->whereHas('user', function ($query) use ($only_agency) {
                $query->where('role',  'agent');
            });
    }

    public function order($order) {
        if (!empty($order)) {
            if ( $order === "nbr_up" )
                $this->builder->orderBy('id', "ASC");

            if ( $order === "nbr_down" )
                $this->builder->orderBy('id', "DESC");

            if ( $order === "data_up" )
                $this->builder->orderBy('created_at', "ASC");

            if ( $order === "data_down" )
                $this->builder->orderBy('created_at', "DESC");

            if ( $order === "punct_up" )
                $this->builder->orderBy('punkt', "ASC");

            if ( $order === "punct_down" )
                $this->builder->orderBy('punkt', "DESC");

        }
    }
}
