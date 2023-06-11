<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PerhitunganController;

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

Route::get('/', function () {
    return view('home');
});

Route::resources([
    'alternatif' => AlternatifController::class,
    'kriteria' => KriteriaController::class,
    'perhitungan' => PerhitunganController::class,
]);

// buat route delete kriteria
Route::delete('/kriteria/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');
Route::delete('/alternatif/{id}', [KriteriaController::class, 'destroy'])->name('alternatif.destroy');

