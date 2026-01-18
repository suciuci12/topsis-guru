<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Guru;
use App\Models\Kriteria;
use App\Models\Nilai;

class TopsisController extends Controller
{
    public function proses()
    {
        $guru = Guru::all();
        $kriteria = Kriteria::all();

        // ===== VALIDASI AWAL =====
        if($guru->count() == 0 || $kriteria->count() == 0){
            return view('topsis.hasil',[
                'hasil' => [],
                'guru'  => $guru,
                'pesan' => 'Data guru atau kriteria belum tersedia'
            ]);
        }

        $x = [];
        $r = [];
        $y = [];

        // 1. MATRKS KEPUTUSAN
        foreach($guru as $g){
            foreach($kriteria as $k){

                $nilai = Nilai::where('guru_id',$g->id)
                        ->where('kriteria_id',$k->id)
                        ->value('nilai');

                $x[$g->id][$k->id] = $nilai ?? 0;
            }
        }

        // Cek apakah semua nilai 0
        $totalNilai = 0;
        foreach($x as $baris){
            $totalNilai += array_sum($baris);
        }

        if($totalNilai == 0){
            return view('topsis.hasil',[
                'hasil' => [],
                'guru'  => $guru,
                'pesan' => 'Belum ada input nilai guru'
            ]);
        }

        // 2. NORMALISASI
        foreach($kriteria as $k){

            $pembagi = 0;

            foreach($guru as $g){
                $pembagi += pow($x[$g->id][$k->id],2);
            }

            $pembagi = sqrt($pembagi);

            foreach($guru as $g){

                if($pembagi == 0){
                    $r[$g->id][$k->id] = 0;
                }else{
                    $r[$g->id][$k->id] =
                        $x[$g->id][$k->id] / $pembagi;
                }
            }
        }

        // 3. NORMALISASI TERBOBOT
        foreach($guru as $g){
            foreach($kriteria as $k){

                $y[$g->id][$k->id] =
                    $r[$g->id][$k->id] * $k->bobot;
            }
        }

        // 4. SOLUSI IDEAL
        $idealPos = [];
        $idealNeg = [];

        foreach($kriteria as $k){

            $nilaiKolom = [];

            foreach($guru as $g){
                $nilaiKolom[] = $y[$g->id][$k->id];
            }

            // PROTEKSI ARRAY KOSONG
            if(count($nilaiKolom) == 0){
                $idealPos[$k->id] = 0;
                $idealNeg[$k->id] = 0;
                continue;
            }

            // ===== PERBAIKAN PENTING: pakai TIPE =====
            if($k->tipe == 'benefit'){
                $idealPos[$k->id] = max($nilaiKolom);
                $idealNeg[$k->id] = min($nilaiKolom);
            }else{
                $idealPos[$k->id] = min($nilaiKolom);
                $idealNeg[$k->id] = max($nilaiKolom);
            }
        }

        // 5. JARAK & PREFERENSI
        $preferensi = [];

        foreach($guru as $g){

            $dPos = 0;
            $dNeg = 0;

            foreach($kriteria as $k){

                $dPos += pow(
                    $y[$g->id][$k->id] - $idealPos[$k->id],
                    2
                );

                $dNeg += pow(
                    $y[$g->id][$k->id] - $idealNeg[$k->id],
                    2
                );
            }

            $dPos = sqrt($dPos);
            $dNeg = sqrt($dNeg);

            if(($dPos + $dNeg) == 0){
                $preferensi[$g->id] = 0;
            }else{
                $preferensi[$g->id] =
                    $dNeg / ($dPos + $dNeg);
            }
        }

        arsort($preferensi);

        return view('topsis.hasil',[
            'hasil' => $preferensi,
            'guru'  => $guru
        ]);
    }
}
