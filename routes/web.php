<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PembobotanController;
use App\Http\Controllers\PenilaianController;

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
    'subkriteria' => PembobotanController::class,
    'penilaian' => PenilaianController::class,
    'perhitungan' => PerhitunganController::class,
]);
