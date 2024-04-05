<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserBronController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HotelBronController;
use App\Http\Controllers\ProezdBronController;


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




Route::middleware(['auth','verified'])->group(function () {

    Route::get('/logout', [AuthController::class, "logout"])->name("logout");

    Route::get('/main', [DashBoardController::class, "index"])->name('dash-board');
    Route::get('/proezd-bron/{direction?}/{punct?}', [ProezdBronController::class, "index"])->name('proezd-bron');
    Route::get('/hotel-bron', [HotelBronController::class, "index"])->name('hotel-bron');
    Route::get('/select-places/{reis}/{punkt?}', [TicketController::class, "index"])->name('select-places');
    Route::get('/add-places/{reis}/{order}', [TicketController::class, "add_places"])->name('add-places');
    Route::get('/orders', [TicketController::class, "all_orders"])->name('all_orders');
    Route::get('/orders/order-edit/{id}', [TicketController::class, "order_edit"])->name('order-edit');

    Route::get('/user_list', [UserListController::class, "index"])->name('user_list');

    Route::get('/show_log', [LogController::class, "index"])->name('show_log');
    Route::get('/show_log/{id}', [LogController::class, "detail"])->name('show_log_detale');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [IndexController::class, "index"])->name('login');
    Route::post('/login_do', [AuthController::class, "login"])->name("login_do");
});
