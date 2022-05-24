<?php

use App\Http\Controllers\adminDashboardContoller;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [WelcomeController::class, 'index']);
// dapatkan nomer meja 
Route::post('home', [WelcomeController::class, 'getMeja'])->name('welcome');


Route::get('home', [HomeController::class, 'show']);
Route::post('home/pesan/{menus:slug}', [HomeController::class, 'pesan']);

Route::get('home/hapus/{order:id_menu}', [OrderController::class, 'hapus']);
Route::get('home/konfirmasi', [OrderController::class, 'konfirmasi']);

Route::get('home/struk/{no}', [ConfirmController::class, 'index']);
Route::get('home/bayar/{no_meja}', [ConfirmController::class, 'bayar']);




Route::get('/dashboard', adminDashboardContoller::class);
Route::resource('dashboard/menu', MenuController::class);
Route::resource('dashboard/user', UserController::class);
