<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $fillable = [
    'kode',
    'nama',
    'bobot',
    'tipe'
];
protected $casts = [
    'bobot' => 'decimal:2'
];


}
