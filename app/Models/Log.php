<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{
    use HasFactory;

    public $fillable = [
        "event",
        "user_id",
        "info",
        "field_id",
        "place_number",
        "order_id",
        "reis_id",
    ];

    public $with = [
        'user',
        'reis',
        'order',
    ];

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function reis()
    {
        return $this->hasOne(Reis::class, "id", "reis_id");
    }

    public function order()
    {
        return $this->hasOne(Order::class, "id", "order_id");
    }


    public function scopeFilter($builder, QueryFilter $filter) {
        return $filter->apply($builder);
    }
}
