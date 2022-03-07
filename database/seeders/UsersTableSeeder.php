<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
                'nik' => 123123,
                'nama_lengkap' => 'Admin Rajeg',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'administrator',
                'jabatan_id' => 1,
                'cabang_id' => 1,
                'status' => 'Karyawan Tetap',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'nik' => 123124,
                'nama_lengkap' => 'Admin Tanah Tinggi',
                'email' => 'admin2@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'administrator',
                'jabatan_id' => 1,
                'cabang_id' => 2,
                'status' => 'Karyawan Tetap',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'nik' => 123125,
                'nama_lengkap' => 'Manager Rajeg',
                'email' => 'manager@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'manager',
                'jabatan_id' => 2,
                'cabang_id' => 1,
                'status' => 'Karyawan Tetap',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'nik' => 123126,
                'nama_lengkap' => 'Manager Tanah Tinggi',
                'email' => 'manager2@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'manager',
                'jabatan_id' => 2,
                'cabang_id' => 2,
                'status' => 'Karyawan Tetap',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'nik' => 123127,
                'nama_lengkap' => 'Accounting Rajeg',
                'email' => 'accounting@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'accounting',
                'jabatan_id' => 3,
                'cabang_id' => 1,
                'status' => 'Karyawan Tetap',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'nik' => 123128,
                'nama_lengkap' => 'Accounting Tanah Tinggi',
                'email' => 'acounting2@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'accounting',
                'jabatan_id' => 3,
                'cabang_id' => 2,
                'status' => 'Karyawan Kontrak',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'nik' => 123129,
                'nama_lengkap' => 'Karyawan Pengawas Lapangan',
                'email' => 'karyawan@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'karyawan',
                'jabatan_id' => 4,
                'cabang_id' => 1,
                'status' => 'Karyawan Kontrak',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'nik' => 1231210,
                'nama_lengkap' => 'Karyawan Network',
                'email' => 'karyawan2@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'karyawan',
                'jabatan_id' => 5,
                'cabang_id' => 2,
                'status' => 'Karyawan Kontrak',
                'created_at' => now(),
                'updated_at' => null,
            ],
         ];
        DB::table('users')->insert($data);
    }
}
