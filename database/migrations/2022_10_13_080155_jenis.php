<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jenis extends Migration
{
   public function up()
   {
    Schema::create('jenis', function (Blueprint $table) {
        $table->id();
        $table->char('uuid');
        $table->string('jenis_mobil');
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
        Schema::dropIfExists('jenis');
    }
}
