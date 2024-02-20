<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        "user_id",
        "comment",
        "reis_id",
    ];

    public $with = [
        'reis',
        'user'
    ];

    public function reis()
    {
        return $this->hasOne(Reis::class, "id", "reis_id");
    }

    public function mesta()
    {
        return $this->hasMeny(Place::class);
    }

    public function user() {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
