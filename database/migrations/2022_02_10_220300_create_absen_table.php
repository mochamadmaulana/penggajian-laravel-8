<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('periode_id');
            $table->string('t_1', 5);
            $table->string('t_2', 5);
            $table->string('t_3', 5);
            $table->string('t_4', 5);
            $table->string('t_5', 5);
            $table->string('t_6', 5);
            $table->string('t_7', 5);
            $table->string('t_8', 5);
            $table->string('t_9', 5);
            $table->string('t_10', 5);
            $table->string('t_11', 5);
            $table->string('t_12', 5);
            $table->string('t_13', 5);
            $table->string('t_14', 5);
            $table->string('t_15', 5);
            $table->string('t_16', 5);
            $table->string('t_17', 5);
            $table->string('t_18', 5);
            $table->string('t_19', 5);
            $table->string('t_20', 5);
            $table->string('t_21', 5);
            $table->string('t_22', 5);
            $table->string('t_23', 5);
            $table->string('t_24', 5);
            $table->string('t_25', 5);
            $table->string('t_26', 5);
            $table->string('t_27', 5);
            $table->string('t_28', 5);
            $table->string('t_29', 5);
            $table->string('t_30', 5);
            $table->string('t_31', 5);
            // $table->string('total_hadir', 5)->nullable();
            // $table->string('total_alpha', 5)->nullable();
            // $table->string('total_izin', 5)->nullable();
            // $table->string('total_cuti', 5)->nullable();
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
        Schema::dropIfExists('absen');
    }
}
