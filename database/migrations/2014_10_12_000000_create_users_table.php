<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 11)->unique();
            $table->string('nama_lengkap', 80);
            $table->string('email', 35)->unique();
            $table->string('password', 100);
            $table->enum('role', ['administrator', 'manager', 'accounting', 'karyawan']);
            $table->foreignId('jabatan_id');
            $table->foreignId('cabang_id');
            $table->boolean('aktif')->nullable();
            $table->enum('status', ['Karyawan Tetap', 'Karyawan Kontrak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
