<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::middleware('auth')->group(function () {
    Route::post('/order/create', [OrderController::class, "create_order"])->name("create_order");
    Route::post('/order/save/{id}', [OrderController::class, "save_order"])->name("save_order");
    Route::get('/order/delete/{id}', [OrderController::class, "delete_order"])->name("delete_order");
});
