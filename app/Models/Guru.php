<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
      protected $fillable = [
        'nama',
        'nip',
        'mapel',
        'jenis_kelamin',
        'alamat',
        'telepon',
        'status_sertifikasi'
    ];
     public function mapels()
    {
        return $this->belongsToMany(Mapel::class);
    }
}
