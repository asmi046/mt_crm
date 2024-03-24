<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasOne(Hotel::class, "id", "user_id");
    }
}
