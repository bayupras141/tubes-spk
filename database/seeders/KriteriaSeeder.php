<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kriteria;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'kode_kriteria' => 'C1',
                'nama_kriteria' => 'Dekorasi',
                'tipe_kriteria' => 'Cost',
                'bobot_kriteria' => 0.15,
            ],
            [
                'id' => 2,
                'kode_kriteria' => 'C2',
                'nama_kriteria' => 'Katering',
                'tipe_kriteria' => 'Cost',
                'bobot_kriteria' => 0.15,
            ],
            [
                'id' => 3,
                'kode_kriteria' => 'C3',
                'nama_kriteria' => 'Busana dan Rias Pengantin',
                'tipe_kriteria' => 'Cost',
                'bobot_kriteria' => 0.15,
            ],
            [
                'id' => 4,
                'kode_kriteria' => 'C4',
                'nama_kriteria' => 'Dokumentasi',
                'tipe_kriteria' => 'Cost',
                'bobot_kriteria' => 0.15,
            ],
            [
                'id' => 5,
                'kode_kriteria' => 'C5',
                'nama_kriteria' => 'Jumlah Tamu',
                'tipe_kriteria' => 'Benefit',
                'bobot_kriteria' => 0.20,
            ],
            [
                'id' => 6,
                'kode_kriteria' => 'C6',
                'nama_kriteria' => 'Harga Paket',
                'tipe_kriteria' => 'Cost',
                'bobot_kriteria' => 0.20,
            ],
        ];

        DB::table('kriteria')->insert($data);
    }
}
