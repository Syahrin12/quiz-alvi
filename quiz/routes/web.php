<?php

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


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/golongan', [App\Http\Controllers\GolonganController::class, 'index']);
Route::post('/golongan/store', [App\Http\Controllers\GolonganController::class, 'store']);
Route::patch('/golongan/{id}', [App\Http\Controllers\GolonganController::class, 'update']);
Route::get('/golongan/{id}', [App\Http\Controllers\GolonganController::class, 'destroy']);
Route::get('/golongan/search', [App\Http\Controllers\GolonganController::class, 'search']);

Route::get('/pelanggan', [App\Http\Controllers\PelangganController::class, 'index']);
Route::post('/pelanggan/store', [App\Http\Controllers\PelangganController::class, 'store']);
Route::patch('/pelanggan/{id}', [App\Http\Controllers\PelangganController::class, 'update']);
Route::get('/pelanggan/{id}', [App\Http\Controllers\PelangganController::class, 'destroy']);