<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::middleware('auth')->group(function () {
    Route::get('/order/get_reserved/{id}', [OrderController::class, "get_reserved"])->name("get_reserved");
    Route::post('/order/add_place', [OrderController::class, "add_place"])->name("add_place");
    Route::post('/order/create', [OrderController::class, "create_order"])->name("create_order");
    Route::post('/order/save/{id}', [OrderController::class, "save_order"])->name("save_order");
    Route::get('/order/delete/{id}', [OrderController::class, "delete_order"])->name("delete_order");
});
