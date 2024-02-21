<?php

namespace App\Filters;

class OrderFilter extends QueryFilter {

    public function state($state) {
        if (!empty($state))
            $this->builder->where("state",  $state);
    }

    public function punkt($punkt) {
        if (!empty($punkt))
            $this->builder->where("punkt",  $punkt);
    }

    public function reis_id($reis_id) {
        if (!empty($reis_id))
            $this->builder->where("reis_id",  $reis_id);
    }

    // public function search_str($search_str) {
    //     if (!empty($search_str))
    //         $this->builder->where(function ($query)   use ($search_str) {
    //             $query->where("description","LIKE", "%".$search_str."%")
    //                     ->orWhere("keywords","LIKE", "%".$search_str."%");
    //         });
    // }

    // public function autor($autor) {
    //     if (!empty($autor))
    //         $this->builder->whereIn("autor",  $autor);
    // }

    // public function vid_ed($vid_ed) {
    //     if (!empty($vid_ed))
    //         $this->builder->whereHas('vid_ed', function ($query) use ($vid_ed) {
    //             $query->whereIn('economic_action_type_id', $vid_ed);
    //         });
    // }

    // public function zak_result($zak_result) {
    //     if (!empty($zak_result))
    //         $this->builder->whereIn("zak_result",  $zak_result);
    // }

    // public function procedure($procedure) {
    //     if (!empty($procedure))
    //         $this->builder->whereIn("procedure",  $procedure);
    // }

    // public function curent_stage($curent_stage) {
    //     if (!empty($curent_stage))
    //         $this->builder->whereIn("curent_stage",  $curent_stage);
    // }

    // public function curent_status($curent_status) {
    //     if (!empty($curent_status))
    //         $this->builder->whereIn("curent_status",  $curent_status);
    // }


    // public function publication_period_begin($publication_period_begin) {
    //     if (!empty($publication_period_begin))
    //         $this->builder->where("create_data", '>', date("Y-m-d H:i:s", strtotime($publication_period_begin)));
    // }

    // public function publication_period_end($publication_period_end) {
    //     if (!empty($publication_period_end))
    //         $this->builder->where("create_data", '<', date("Y-m-d H:i:s", strtotime($publication_period_end)));
    // }

}
