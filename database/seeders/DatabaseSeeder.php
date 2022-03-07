<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            CabangTableSeeder::class,
            JabatanTableSeeder::class,
            // PeriodeTableSeeder::class,
            // AbsenTableSeeder::class,
        ]);
        // \App\Models\User::factory()->create();
        // \App\Models\Cabang::factory()->create();
        // \App\Models\Jabatan::factory()->create();
    }
}
