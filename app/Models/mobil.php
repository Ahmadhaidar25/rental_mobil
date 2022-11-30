<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;
    protected $table = 'mobil';
    

     public function jenis()
    {
       return $this->belongsTo(jenis::class);
    }

    public function merek()
    {
       return $this->belongsTo(merek::class);
    }

     public function transaksi()
    {
       return $this->hasMany(transaksimobil::class);
    }

    public function komentar()
    {
       return $this->hasMany(komentar::class);
    }

     public function like()
    {
       return $this->hasMany(like::class);
    }

    public function transaksi_pembayaran()
    {
       return $this->hasMany(transaksipembayaran::class);
    }
}
