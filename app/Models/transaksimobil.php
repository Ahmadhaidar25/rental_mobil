<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksimobil extends Model
{
  use HasFactory;
  protected $table = 'mobil_transaksi';

  public function mobil()
  {
    return $this->belongsTo(mobil::class);

 }

 public function user()
 {
  return $this->belongsTo(User::class);
}

public function transaksipembayaran()
{
  return $this->hasOne(transaksipembayaran::class);
}
}
