<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';
    protected $guarded=['id'];

     public function mobil()
    {
       return $this->belongsTo(mobil::class);
    }

    public function user()
    {
       return $this->belongsTo(user::class);
    }

     public function cailds1()
    {
        return $this->hasMany(komentar::class,'parent');
    }

     public function cailds2()
    {
        return $this->hasMany(komentar::class,'parent');
    }
}
