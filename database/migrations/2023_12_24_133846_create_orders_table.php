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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user_id')->comment('Пользователь оформивший заказ');
            $table->integer('reis_id')->comment('id рейса');
            $table->string('punkt')->comment('Пункт следования');
            $table->string('state')->comment('Состояник');
            $table->float('price',10, 2)->default(0)->comment('Полная стоимость');
            $table->float('avanc',10, 2)->default(0)->comment('Внесенный аванс');
            $table->text('comment')->nullable()->comment('Комментарий к заказу');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
