<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HotelBronController;
use App\Http\Controllers\ProezdBronController;
use App\Http\Controllers\UserBronController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\TicketController;

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
    Route::get('/user-data', [UserDataController::class, "index"])->name('user-data');
    Route::get('/select-places/{reis}/{punkt?}', [TicketController::class, "index"])->name('select-places');
    Route::get('/orders', [TicketController::class, "all_orders"])->name('all_orders');
    Route::get('/orders/order-edit/{id}', [TicketController::class, "order_edit"])->name('order-edit');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [IndexController::class, "index"])->name('login');
    Route::post('/login_do', [AuthController::class, "login"])->name("login_do");

    Route::get('/password-recovery', [AuthController::class, "show_passrec_form"])->name("passrec");
    Route::post('/pass_rec_do', [AuthController::class, "pass_req"])->name("pass_rec_do");
    Route::get('/reset-password/{token}', [AuthController::class, "pass_new_enter"])->name("password.reset");
    Route::post('/reset-password', [AuthController::class, "pass_new_save"])->name('password.update');
});
