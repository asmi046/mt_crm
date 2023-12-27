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
        Schema::create('punkts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->comment('Имя');
            $table->string('koordinate')->nullable()->comment('Координаты для вывода на карту');
            $table->string('big_city')->nullable()->comment('принадлежность к району или городу');
            $table->string('description')->comment('Описание');
        });

        Schema::create('direction_punkt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('direction_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('punkt_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direction_punkt');
        Schema::dropIfExists('punkts');
    }
};
