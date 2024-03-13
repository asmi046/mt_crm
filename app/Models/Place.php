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
        'doc_n',
        'dr',
        'phone',
        'comment'
    ];

    // public $with = [
    //     'order',
    //     'reis'
    // ];

    public function order()
    {
        return $this->hasOne(Order::class, "id", "order_id");
    }

    public function reis()
    {
        return $this->hasOne(Reis::class, "id", "reis_id");
    }
}
