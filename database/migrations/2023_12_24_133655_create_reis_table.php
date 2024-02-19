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
        Schema::create('reis', function (Blueprint $table) {
            $table->id();
            $table->date("start_to_date")->comment('Отправление из Курска');
            $table->date("prib_to_date")->comment('Прибытие на курорт');
            $table->date("start_out_date")->comment('Отправление в Курск');
            $table->date("prib_out_date")->comment('Прибытие в Курск');
            $table->integer("bus")->comment('Автобус на рейсе');
            $table->text('information')->nullable()->comment('Информация по рейсу');
            $table->foreignId('direction_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reis');
    }
};
