<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanTableSeeder extends Seeder
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
                'jabatan' => 'Administrator',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'jabatan' => 'Manager',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'jabatan' => 'Accounting',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'jabatan' => 'Pengawas Lapangan',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'jabatan' => 'Network Operation Center',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'jabatan' => 'Marketing',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'jabatan' => 'Crew',
                'created_at' => now(),
                'updated_at' => null,
            ],
        ];
        DB::table('jabatan')->insert($data);
    }
}
