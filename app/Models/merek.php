<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merek extends Model
{
    use HasFactory;

    protected $table = 'merek';

    public function mobil()
    {
       return $this->hasMany(mobil::class);
    }
}
