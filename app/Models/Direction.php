<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'start_punkt',
        'end_punkt',
        'description',
        'direction_id',
    ];

    public function puncts() {
        return $this->belongsToMany(Punkt::class);
    }

    public function reises() {
        return $this->hasMany(Reis::class);
    }
}
