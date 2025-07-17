<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RencanaController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PerjalananController;
use App\Models\RencanaLiburan;
use App\Models\Peserta;
use App\Models\Perjalanan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $rencanaCount = RencanaLiburan::count();
    $pesertaCount = Peserta::count();
    $perjalananCount = Perjalanan::count();
    return view('dashboard', compact('rencanaCount', 'pesertaCount', 'perjalananCount'));
})->name('dashboard');

Route::resource('rencana', RencanaController::class);
Route::resource('peserta', PesertaController::class);
Route::resource('perjalanan', PerjalananController::class);
