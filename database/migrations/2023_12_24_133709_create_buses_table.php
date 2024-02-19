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
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->comment("Название автобуса");
            $table->integer('mest')->comment("Количество мест");
            $table->string('schema')->comment("Схема посадки");
        });

        // Schema::create('buses_reis', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('buses_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        //     $table->foreignId('reis_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('buses_reis');
        Schema::dropIfExists('buses');
    }
};
