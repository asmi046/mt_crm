<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public $fillable = [
        'number',
        'reis_id',
        'order_id',
        'punkt',
        'direction',
        'direction_text',
        'f',
        'i',
        'o',
        'doc_type',
        'dr',
        'phone',
        'comment'
    ];

}
