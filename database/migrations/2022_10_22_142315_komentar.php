<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Komentar extends Migration
{
   public function up()
   {
    Schema::create('komentar', function (Blueprint $table) {
        $table->id();
        $table->char('uuid');
        $table->string('user_id');
        $table->string('mobil_id');
        $table->text('komentar');
        $table->integer('parent');
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
        Schema::dropIfExists('komentar');
    }
}
