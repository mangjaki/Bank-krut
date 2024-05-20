<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('buku', BukuController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('peminjaman', PeminjamanController::class);
Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus.index');
Route::get('/', [DashboardController::class, 'index'])->name('home');
