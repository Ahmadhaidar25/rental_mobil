<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengguna extends Migration
{
  public function up()
  {
    Schema::create('pengguna', function (Blueprint $table) {
        $table->id();
        $table->char('uuid');
        $table->string('no_ktp');
        $table->string('gander');
        $table->integer('no_tlp');
        $table->text('alamat');
        $table->string('pekerjaan');
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
        Schema::dropIfExists('pengguna');
    }
}
