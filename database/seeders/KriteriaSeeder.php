<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $data = [
        ['kode'=>'C1','nama'=>'Pedagogik','bobot'=>0.30,'tipe'=>'benefit'],
        ['kode'=>'C2','nama'=>'Profesional','bobot'=>0.25,'tipe'=>'benefit'],
        ['kode'=>'C3','nama'=>'Kepribadian','bobot'=>0.25,'tipe'=>'benefit'],
        ['kode'=>'C4','nama'=>'Kehadiran','bobot'=>0.20,'tipe'=>'benefit'],
    ];

    foreach($data as $d){
        Kriteria::create($d);
    }
}

}
