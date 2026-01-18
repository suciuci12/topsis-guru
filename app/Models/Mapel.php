<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
     protected $fillable = ['nama_mapel', 'kode'];

    public function gurus()
    {
        return $this->belongsToMany(Guru::class);
    }
}
