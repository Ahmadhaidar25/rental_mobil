<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class pengguna extends Model
{
    use HasFactory;

    protected $table = 'pengguna';
    //protected $primaryKey = 'id';
    //protected $fillable=['id','uuid','user_id','no_ktp','tempat_lahir','tgl_lahir','umur','gander',
    //'no_tlp','alamat','pekerjaan'];

     public function user()
    {
       return $this->belongsTo(User::class);
    }
}
