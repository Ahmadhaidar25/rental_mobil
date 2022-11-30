<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksi extends Migration
{
 public function up()
 {
    Schema::create('transaksi_mobil', function (Blueprint $table) {
        $table->id();
        $table->char('uuid');
        $table->string('user_id');
        $table->string('mobil_id');
        $table->integer('jumlah_sewa');
        $table->integer('lama_sewa');
        $table->date('dari_tanggal');
        $table->date('sampai_tanggal');
        $table->string('dari_kota');
        $table->string('ke_kota');
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
        Schema::dropIfExists('transaksi_mobil');
    }
}
