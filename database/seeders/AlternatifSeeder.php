<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alternatif;
use Illuminate\Support\Facades\DB;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'kode_alternatif' => 'A1',
                'nama_alternatif' => 'Paket 1',
                'C1' => 5,
                'C2' => 4,
                'C3' => 2,
                'C4' => 3,
                'C5' => 1000,
                'C6' => 95000000,
            ],
            [
                'id' => 2,
                'kode_alternatif' => 'A2',
                'nama_alternatif' => 'Paket II',
                'C1' => 2,
                'C2' => 3,
                'C3' => 1,
                'C4' => 2,
                'C5' => 500,
                'C6' => 44000000,
            ],
            [
                'id' => 3,
                'kode_alternatif' => 'A3',
                'nama_alternatif' => 'Paket III',
                'C1' => 4,
                'C2' => 3,
                'C3' => 4,
                'C4' => 2,
                'C5' => 1000,
                'C6' => 70000000,
            ],
            [
                'id' => 4,
                'kode_alternatif' => 'A4',
                'nama_alternatif' => 'Paket IV',
                'C1' => 4,
                'C2' => 3,
                'C3' => 3,
                'C4' => 2,
                'C5' => 800,
                'C6' => 81000000,
            ],
            [
                'id' => 5,
                'kode_alternatif' => 'A5',
                'nama_alternatif' => 'Paket V',
                'C1' => 4,
                'C2' => 3,
                'C3' => 5,
                'C4' => 3,
                'C5' => 800,
                'C6' => 58000000,
            ],
            [
                'id' => 6,
                'kode_alternatif' => 'A6',
                'nama_alternatif' => 'Paket VI',
                'C1' => 5,
                'C2' => 2,
                'C3' => 2,
                'C4' => 3,
                'C5' => 600,
                'C6' => 49000000,
            ],
        ];

        DB::table('alternatif')->insert($data);
    }
}
