<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punkt extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'koordinate',
        'big_city',
        'description',
    ];
}
