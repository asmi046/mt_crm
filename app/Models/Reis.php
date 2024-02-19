<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reis extends Model
{
    use HasFactory;

    public $fillable = [
        "start_to_date",
        "prib_to_date",
        "start_out_date",
        "prib_out_date",
        "bus",
        "information",
        "direction_id"
    ];

    public $with = [
        'direction',
        'reis_bus'
    ];

    public function reis_bus()
    {
        return $this->hasOne(Bus::class, "id", 'bus');
    }

    public function direction() {
        return $this->hasOne(Direction::class,'id', 'direction_id');
    }
}
