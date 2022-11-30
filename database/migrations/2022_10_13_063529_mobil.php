<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mobil extends Migration
{
   public function up()
   {
    Schema::create('mobil', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->string('no_polisi')->unique();
        $table->integer('merk_id');
        $table->string('kapasitas');
        $table->integer('jenis_id');
        $table->string('transmisi');
        $table->string('bahan_bakar');
        $table->integer('status');
        $table->string('kondisi');
        $table->integer('stok');
        $table->integer('harga');
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
        Schema::dropIfExists('mobil');
    }
}
