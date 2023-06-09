<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            // $table->integer('user_id');
            $table->integer('admin_id');
            $table->integer('kerja_praktek_id');
            $table->string('nilai_sopan_santun'); 
            $table->string('nilai_dedikasi'); 
            $table->string('nilai_presensi_kehadiran'); 
            $table->string('nilai_tanggung_jawab'); 
            $table->string('nilai_kemampuan_bekerjasama'); 
            $table->string('nilai_prakarsa'); 
            $table->string('nilai_skill'); 
            $table->string('nilai'); 
            $table->string('keterangan');
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
        Schema::dropIfExists('nilais');
    }
}
