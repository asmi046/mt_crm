<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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


    protected function dr(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($value)?date("d.m.Y", strtotime($value)):null,
            set: fn ($value) => ($value)?date("Y-m-d", strtotime($value)):null,
        );
    }

    public function order()
    {
        return $this->hasOne(Order::class, "id", "order_id");
    }

    public function reis()
    {
        return $this->hasOne(Reis::class, "id", "reis_id");
    }
}
