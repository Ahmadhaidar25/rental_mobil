<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksipembayaran extends Model
{
    use HasFactory;
    protected $table = 'transaksi_pembayaran';

    public function transaksi_mobil()
    {
       return $this->belongsTo(transaksimobil::class);

   }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
