<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::middleware('auth')->group(function () {

    Route::get('/reports', [ReportController::class, "index"])->name("reports");
    Route::get('/reports/rassadca/{reis_id}/{direction}', [ReportController::class, "rassadca"])->name("rassadca");
    Route::get('/reports/list/{reis_id}/{direction}', [ReportController::class, "list"])->name("list");
});
