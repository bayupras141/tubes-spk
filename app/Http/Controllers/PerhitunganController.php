<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Pembobotan;

class PerhitunganController extends Controller
{
    public function index()
    {
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
        // penilaian berdasarkan id alternatif
        $penilaian = Penilaian::with('alternatif')->get();
        $pembobotan = Pembobotan::all();

        return view('perhitungan.index', compact('alternatif', 'kriteria', 'penilaian', 'pembobotan'));
    }
}
