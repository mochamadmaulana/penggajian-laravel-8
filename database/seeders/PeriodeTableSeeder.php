<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'tahun' => '2022',
                'bulan' => 'Januari',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'tahun' => '2022',
                'bulan' => 'Februari',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'tahun' => '2022',
                'bulan' => 'Maret',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'tahun' => '2022',
                'bulan' => 'April',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'tahun' => '2022',
                'bulan' => 'Mei',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'tahun' => '2022',
                'bulan' => 'Juni',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'tahun' => '2022',
                'bulan' => 'Juli',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'tahun' => '2022',
                'bulan' => 'Agustus',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'tahun' => '2022',
                'bulan' => 'September',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'tahun' => '2022',
                'bulan' => 'Oktober',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'tahun' => '2022',
                'bulan' => 'November',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'tahun' => '2022',
                'bulan' => 'Desember',
                'created_at' => now(),
                'updated_at' => null,
            ],
        ];

        DB::table('periode')->insert($data);
    }
}
