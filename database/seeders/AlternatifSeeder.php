<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alternatif;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_alternatif' => 'A1',
                'nama_alternatif' => 'Sutriman',
                'alamat_alternatif' => 'Dusun Kantil',
                'pekerjaan_alternatif' => 'Pekerja tetap',
                'penghasilan_alternatif' => 5000000,
                'jumlah_keluarga_alternatif' => 4,
                'umur_alternatif' => 40,
                'jenis_rumah_alternatif' => 'Rumah Bambu',
            ],
            [
                'kode_alternatif' => 'A2',
                'nama_alternatif' => 'Prayogi',
                'alamat_alternatif' => 'Dusun Kantil',
                'pekerjaan_alternatif' => 'Pekerja tetap',
                'penghasilan_alternatif' => 5000000,
                'jumlah_keluarga_alternatif' => 4,
                'umur_alternatif' => 30,
                'jenis_rumah_alternatif' => 'Rumah Beton',
            ]

        ]
    }
}
