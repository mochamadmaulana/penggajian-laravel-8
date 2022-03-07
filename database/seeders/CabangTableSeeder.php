<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabangTableSeeder extends Seeder
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
                'cabang' => 'Rajeg',
                'alamat' => 'Ruko Gardenia Blok E No. 23 Desa Rajeg Mulia, Kec. Rajeg. Kab. Tangerang Banten 15540',
                'telephone' => '081284143070',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'cabang' => 'Tanah Tinggi',
                'alamat' => 'Jl. Jenderal Sudirman No.11, Tanah Tinggi, Kec. Tangerang, Kota Tangerang, Banten 15119',
                'telephone' => '081389710228',
                'created_at' => now(),
                'updated_at' => null,
            ],
        ];
        DB::table('cabang')->insert($data);
    }
}
