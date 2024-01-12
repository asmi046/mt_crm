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
        "information"
    ];
}
