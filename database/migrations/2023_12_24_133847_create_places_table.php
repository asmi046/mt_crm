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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('number')->comment('Номер места');
            $table->integer('reis_id')->comment('ID рейса');
            $table->foreignId('order_id')->comment('ID заказа')
                                        ->constrained()
                                        ->onUpdate('cascade')
                                        ->onDelete('cascade');
            $table->string('punkt')->comment('Пункт прибывания');
            $table->string('direction',5)->comment('Направление');
            $table->string('direction_text')->comment('Направление тест');
            $table->string('f')->nullable()->comment('Фамилия');
            $table->string('i')->nullable()->comment('Имя');
            $table->string('o')->nullable()->comment('Отчество');
            $table->string('doc_type')->nullable()->comment('Вид документа');
            $table->string('doc_n')->nullable()->comment('Номер документа');
            $table->string('dr')->nullable()->comment('Дата рождения');
            $table->string('phone')->nullable()->comment('Контактный телефон');
            $table->text('comment')->nullable()->comment('Комментарий');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
