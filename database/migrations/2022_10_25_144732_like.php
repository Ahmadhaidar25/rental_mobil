<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Like extends Migration
{

   public function up()
   {
    Schema::create('like', function (Blueprint $table) {
        $table->id();
        $table->char('uuid');
        $table->integer('user_id');
        $table->integer('mobil_id');
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
        Schema::dropIfExists('like');
    }
}
