<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;

Route::middleware('auth')->group(function () {

    Route::post('/place/replace', [PlaceController::class, "place_replace"])->name("place_replace");
    Route::post('/place/edit/{id}', [PlaceController::class, "place_edit"])->name("place_edit");
    Route::get('/place/delete/{id}', [PlaceController::class, "place_delete"])->name("place_delete");
});
