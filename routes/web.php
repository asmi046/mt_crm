<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HotelBronController;
use App\Http\Controllers\ProezdBronController;
use App\Http\Controllers\UserBronController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, "index"])->name('home');
Route::get('/main', [DashBoardController::class, "index"])->name('dash-board');
Route::get('/proezd-bron', [ProezdBronController::class, "index"])->name('proezd-bron');
Route::get('/hotel-bron', [HotelBronController::class, "index"])->name('hotel-bron');
Route::get('/user-bron', [UserBronController::class, "index"])->name('user-bron');
