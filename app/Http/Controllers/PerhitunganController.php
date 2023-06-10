<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;

class PerhitunganController extends Controller
{
    public function index()
    {
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();

        // cari nilai min pada setip alternatif
        $minC1 = Alternatif::min('c1');
        $minC2 = Alternatif::min('c2');
        $minC3 = Alternatif::min('c3');
        $minC4 = Alternatif::min('c4');
        $maxC5 = Alternatif::max('c5');
        $minC6 = Alternatif::min('c6');

        //jumlah sum data C1 + minC1 
        $sumC1 = Alternatif::sum('c1') + $minC1;
        $sumC2 = Alternatif::sum('c2') + $minC2;
        $sumC3 = Alternatif::sum('c3') + $minC3;
        $sumC4 = Alternatif::sum('c4') + $minC4;
        $sumC5 = Alternatif::sum('c5') + $maxC5;
        $sumC6 = Alternatif::sum('c6') + $minC6;


        // normalisasi matriks 
        $c1 = 1/$minC1;
        $c2 = 1/$minC2;
        $c3 = 1/$minC3;
        $c4 = 1/$minC4;
        $c5 = $maxC5/$sumC5;
        $c6 = 1/$minC6;
        $matriks = [];

        $matriks[0] = [$c1, $c2, $c3, $c4, $c5, $c6];

        // lakukan foreach untuk menghitung nilai matriks start dari 1
        foreach ($alternatif as $key => $value) {
            $matriks[$key+1] = [
               1/$value->c1,
               1/$value->c2,
               1/$value->c3,
               1/$value->c4,
               $value->c5/$sumC5,
               1/$value->c6,
            ];
        }
        
        // jumlah nilai matriks setiap kolom
        $sumMatriks = [];
        for ($i=0; $i < count($matriks[0]); $i++) { 
            $sumMatriks[$i] = 0;
            for ($j=0; $j < count($matriks); $j++) { 
                $sumMatriks[$i] += $matriks[$j][$i];
            }
        }

        // matriks dibagi sumMatriks 
        $nmatriks = [];
        for ($i=0; $i < count($matriks); $i++) { 
            for ($j=0; $j < count($matriks[$i]); $j++) { 
                $nmatriks[$i][$j] = $matriks[$i][$j] / $sumMatriks[$j];
            }
        }

        return view('perhitungan.index', compact(
            'alternatif', 
            'kriteria', 
            'minC1', 
            'minC2', 
            'minC3', 
            'minC4', 
            'maxC5', 
            'minC6',
            'sumC1',
            'sumC2',
            'sumC3',
            'sumC4',
            'sumC5',
            'sumC6',
            'matriks',
            'sumMatriks',
            'nmatriks'
        ));
    }
}
