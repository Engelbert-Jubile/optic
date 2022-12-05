<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\Customer;
use App\Http\Controllers\Kacamata;
use App\Http\Controllers\Transaksi;
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



Route::middleware(['logged.in'])->group(function () {
    Route::get('/',[Auth::class, 'login']);
    Route::post('/',[Auth::class, 'login_process']);
});
Route::middleware(['is.logged'])->group(function () {
    Route::prefix('customer')->group(function () {
        Route::get('/',[Customer::class, 'index']);
        Route::get('/tambah',[Customer::class, 'tambah']);
        Route::post('/tambah',[Customer::class, 'store']);
        Route::get('/hapus/{id}',[Customer::class, 'destroy']);
        Route::get('/ubah/{id}',[Customer::class, 'ubah']);
        Route::post('/ubah/{id}',[Customer::class, 'update']);
        Route::get('/detail/{id}',[Customer::class, 'detail']);
    });
    Route::prefix('transaksi')->group(function () {
        Route::get('/{id}',[Transaksi::class, 'index']);
        Route::get('/tambah/{id}',[Transaksi::class, 'tambah']);
        Route::post('/tambah/{id}',[Transaksi::class, 'store']);
        Route::get('/hapus/{id}',[Transaksi::class, 'destroy']);
        Route::get('/ubah/{id}',[Transaksi::class, 'ubah']);
        Route::post('/ubah/{id}',[Transaksi::class, 'update']);
    });
    Route::prefix('kacamata')->group(function () {
        Route::get('/',[Kacamata::class, 'index']);
        Route::get('/tambah',[Kacamata::class, 'tambah']);
        Route::post('/tambah',[Kacamata::class, 'store']);
        Route::get('/hapus/{id}',[Kacamata::class, 'destroy']);
        Route::get('/ubah/{id}',[Kacamata::class, 'ubah']);
        Route::post('/ubah/{id}',[Kacamata::class, 'update']);
    });
});

Route::get('/logout',[Auth::class, 'logout']);