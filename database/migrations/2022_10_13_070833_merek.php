<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Merek extends Migration
{
   public function up()
   {
    Schema::create('merek', function (Blueprint $table) {
        $table->id();
        $table->char('uuid');
        $table->string('merek');
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
        Schema::dropIfExists('merek');
    }
}
