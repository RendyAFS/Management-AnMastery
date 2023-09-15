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
use App\Http\Controllers\GambarKainController;
use App\Models\Supplier;
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
    // Dashboard
    Route::resource('dashboards', DashboardController::class);

    // Supplier
    Route::resource('suppliers', SupplierController::class);
    Route::get('getsuppliers', [SupplierController::class,'getData'])->name('suppliers.getData');


    // Absensi
    Route::resource('absensis', AbsensiController::class);
    Route::get('getemployees', [AbsensiController::class,'getData'])->name('employees.getData');
    Route::get('absensi/{id}', [AbsensiController::class, 'absensi'])->name('absensi.show');



    //OnProses
    Route::resource('onproses', OnprosesController::class);
    Route::get('selesai', [OnprosesController::class,'selesai'])->name('selesai');
    Route::get('clearselesai', [OnprosesController::class, 'clearselesai'])->name('clearselesai');
    Route::get('restore/{id}', [OnprosesController::class, 'restore'])->name('restore');
    Route::delete('selesaisemua', [OnprosesController::class, 'selesaisemua'])->name('selesaisemua');
    Route::get('restoreall', [OnprosesController::class, 'restoreall'])->name('restoreall');



    //Gaji
    Route::resource('gajis', GajiController::class);
    Route::delete('deleteall', [GajiController::class, 'deleteall'])->name('deleteall');



    // Incomee
    Route::resource('incomes', IncomeController::class);
    Route::get('getincomes', [IncomeController::class,'getData'])->name('incomes.getData');


    // Gambar Kain
    Route::resource('Gkains', GambarKainController::class);






});

// HALAMAN USER
Route::prefix('user')->middleware(['auth', 'user'])->group(function(){
    Route::get('/dashboard', [SesiController::class, 'indexuser'])->name('user');
});
