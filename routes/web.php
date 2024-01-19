<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HotelBronController;
use App\Http\Controllers\ProezdBronController;
use App\Http\Controllers\UserBronController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\BuyTicketController;

use App\Http\Controllers\Auth\AuthController;


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




Route::middleware('auth')->group(function () {

    Route::get('/logout', [AuthController::class, "logout"])->name("logout");

    Route::get('/main', [DashBoardController::class, "index"])->name('dash-board');
    Route::get('/proezd-bron/{direction?}/{punct?}', [ProezdBronController::class, "index"])->name('proezd-bron');
    Route::get('/hotel-bron', [HotelBronController::class, "index"])->name('hotel-bron');
    Route::get('/user-bron', [UserBronController::class, "index"])->name('user-bron');
    Route::get('/user-data', [UserDataController::class, "index"])->name('user-data');
    Route::get('/buy-ticket/{reis}/{punkt?}', [BuyTicketController::class, "index"])->name('buy-ticket');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [IndexController::class, "index"])->name('login');
    Route::post('/login_do', [AuthController::class, "login"])->name("login_do");
});
