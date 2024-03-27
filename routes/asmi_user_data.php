<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDataController;

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/user-chenge/{id}', function($id){
        Auth::loginUsingId($id);
        return redirect()->back();
    })->name('user-chenge');

    Route::get('/user-data', [UserDataController::class, "index"])->name('user-data');
    Route::post('/save_user_data', [UserDataController::class, "save_user_data"])->name('save_user_data');
    Route::post('/chenge_user_password', [UserDataController::class, "chenge_user_password"])->name('chenge_user_password');
});
