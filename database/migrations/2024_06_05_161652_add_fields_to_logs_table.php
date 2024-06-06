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
        Schema::table('logs', function (Blueprint $table) {
            $table->integer("field_id")->nullable()->comment('ID сущьности');
            $table->integer('place_number')->nullable()->comment('Номер места');
            $table->integer('order_id')->nullable()->comment('id брони');
            $table->integer('reis_id')->nullable()->comment('id рейса');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('logs', function (Blueprint $table) {
            //
        });
    }
};
