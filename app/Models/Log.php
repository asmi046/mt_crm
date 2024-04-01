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
    ];

    public $with = [
        'user'
    ];

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }


    public function scopeFilter($builder, QueryFilter $filter) {
        return $filter->apply($builder);
    }
}
