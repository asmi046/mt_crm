<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->comment('Название отеля');
            $table->string('city')->comment('Город');
            $table->string('geo')->nullable()->comment('Координаты');
            $table->string('img')->nullable()->comment('Фото отеля');
            $table->string('short_description')->nullable()->comment('Краткое описание отеля');
            $table->text('description')->nullable()->comment('Полное описание отеля');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
