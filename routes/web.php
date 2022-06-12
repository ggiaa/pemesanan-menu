<?php

use App\Http\Controllers\adminDashboardContoller;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// User
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::post('/', [WelcomeController::class, 'getMeja']);


Route::get('home', [HomeController::class, 'show']);
Route::get('home/makanan', [HomeController::class, 'makanan']);
Route::get('home/minuman', [HomeController::class, 'minuman']);


Route::post('pesan/{menus:slug}', [OrderController::class, 'pesan']);
Route::get('hapus/{order:id_menu}', [OrderController::class, 'hapus']);
Route::get('konfirmasi', [OrderController::class, 'konfirmasi']);


Route::get('struk/{no}', [ConfirmController::class, 'index']);
Route::get('bayar/{no_meja}', [ConfirmController::class, 'bayar']);


Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
// Admin

Route::middleware('auth')->group(function () {

    Route::post('dashboard/logout', [LoginController::class, 'logout']);

    Route::get('/dashboard/pesanan', [AdminOrderController::class, 'index']);
    Route::post('/dashboard/pesanan/detail', [AdminOrderController::class, 'detail']);
    Route::get('/dashboard/pesanan/{meja}/{menu}', [AdminOrderController::class, 'confirm']);

    Route::get('/dashboard/laporan', [SaleController::class, 'index']);
    Route::get('/dashboard/laporan/{date}', [SaleController::class, 'show']);

    Route::get('/dashboard', adminDashboardContoller::class);
    Route::resource('dashboard/menu', MenuController::class);
    Route::resource('dashboard/user', UserController::class);
});
