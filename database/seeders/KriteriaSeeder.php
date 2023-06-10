<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kriteria;

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
                'jenis' => 'Cost',
                'bobot' => 0.15,
            ],
            [
                'id' => 2,
                'kode_kriteria' => 'C2',
                'nama_kriteria' => 'Katering',
                'jenis' => 'Cost',
                'bobot' => 0.15,
                'created_at' => '2023-06-04 03:08:44',
                'updated_at' => '2023-06-04 03:08:44',
            ],
            [
                'id' => 3,
                'kode_kriteria' => 'C3',
                'nama_kriteria' => 'Busana dan Rias Pengantin',
                'jenis' => 'Cost',
                'bobot' => 0.15,
                'created_at' => '2023-06-04 03:26:22',
                'updated_at' => '2023-06-04 03:26:22',
            ],
            [
                'id' => 4,
                'kode_kriteria' => 'C4',
                'nama_kriteria' => 'Dokumentasi',
                'jenis' => 'Cost',
                'bobot' => 0.15,
                'created_at' => '2023-06-04 03:26:43',
                'updated_at' => '2023-06-04 03:26:43',
            ],
            [
                'id' => 5,
                'kode_kriteria' => 'C5',
                'nama_kriteria' => 'Jumlah Tamu',
                'jenis' => 'Benefit',
                'bobot' => 0.20,
                'created_at' => '2023-06-04 03:27:03',
                'updated_at' => '2023-06-04 03:27:03',
            ],
            [
                'id' => 6,
                'kode_kriteria' => 'C6',
                'nama_kriteria' => 'Harga Paket',
                'jenis' => 'Cost',
                'bobot' => 0.20,
            ],
        ];

        DB::table('kriterias')->insert($data);
    }
}
