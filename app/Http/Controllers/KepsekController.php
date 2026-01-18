<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Validasi;
use App\Models\Guru;
use App\Models\Kriteria;
use App\Models\Nilai;

class KepsekController extends Controller
{
    public function dashboard()
    {
        return view('kepsek.dashboard');
    }

    public function setujui(Request $r)
    {
        Validasi::create([
            'periode' => date('Y'),
            'status' => 'disetujui',
            'catatan' => $r->catatan
        ]);

        return back()->with('msg','Hasil disetujui');
    }

    public function tolak(Request $r)
    {
        Validasi::create([
            'periode' => date('Y'),
            'status' => 'ditolak',
            'catatan' => $r->catatan
        ]);

        return back()->with('msg','Hasil ditolak');
    }

    public function riwayat()
    {
        $data = Validasi::latest()->get();
        return view('kepsek.riwayat',compact('data'));
    }
}
