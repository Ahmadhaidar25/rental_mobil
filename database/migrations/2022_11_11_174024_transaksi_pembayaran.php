<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiPembayaran extends Migration
{
    public function up()
  {
    Schema::create('transaksi_pembayaran', function (Blueprint $table) {
        $table->id();
        $table->char('uuid');
        $table->string('status');
        $table->string(' transaction_id');
        $table->integer('transaksi_mobil_id');
        $table->string('gross_amount');
        $table->string('payment_type');
        $table->string('payment_code');
        $table->string('pdf_url');
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
        Schema::dropIfExists('transaksi_pembayaran');
    }
}
