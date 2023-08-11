<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\OnprosesController;
use App\Http\Controllers\GajiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/home', [HomeController::class, 'index'])->name('home');

// Halaman Tamu
Route::get('/', [SesiController::class, 'index']);
Auth::routes();


// Seleksi Role
Route::post('/login', [LoginController::class, 'authenticate']);

// HALAMAN ADMIN
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin');
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
    Route::get('/income', [IncomeController::class, 'index'])->name('income');
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
    Route::get('/onproses', [OnprosesController::class, 'index'])->name('onproses');
    Route::get('/gaji', [GajiController::class, 'index'])->name('gaji');
    // Route::get('/storesupplier', [SupplierController::class, 'store'])->name('storesupplier');
    Route::post('/storesupplier', [SupplierController::class, 'store'])->name('storesupplier');
});

// HALAMAN USER
Route::prefix('user')->middleware(['auth', 'user'])->group(function(){
    Route::get('/dashboard', [SesiController::class, 'indexuser'])->name('user');
});
