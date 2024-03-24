<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        "user_id",
        "comment",
        "reis_id",
        "hotel_id",
        "punkt",
        "price",
        "avanc",
        "state",
    ];

    public $with = [
        'reis',
        'user',
        'mesta'
    ];

    public function hotel()
    {
        return $this->hasOne(Hotel::class, "id", "hotel_id");
    }

    public function reis()
    {
        return $this->hasOne(Reis::class, "id", "reis_id");
    }

    public function mesta()
    {
        return $this->hasMany(Place::class, "order_id", "id");
    }

    public function user() {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function scopeFilter($builder, QueryFilter $filter) {
        return $filter->apply($builder);
    }
}
