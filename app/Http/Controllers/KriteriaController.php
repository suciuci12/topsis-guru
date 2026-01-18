<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();

        return view('kriteria.index', compact('kriteria'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode'  => 'required',
            'nama'  => 'required',
            'bobot' => 'required|numeric',
            'tipe'  => 'required'
        ]);

        Kriteria::create($request->all());

        return redirect('/kriteria')
            ->with('msg','Kriteria berhasil ditambah');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::find($id);

        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::find($id);

        $kriteria->update($request->all());

        return redirect('/kriteria')
            ->with('msg','Kriteria diupdate');
    }

    public function destroy($id)
    {
        Kriteria::find($id)->delete();

        return back()->with('msg','Kriteria dihapus');
    }
    public function cetakPdf()
{
    $data = Kriteria::all();

    $pdf = Pdf::loadView('kriteria.pdf',[
        'kriteria' => $data
    ]);

    return $pdf->download('data-kriteria.pdf');
}
public function reset()
{
    // Hapus semua kriteria lama
    Kriteria::truncate();

    // Masukkan default C1–C4
    Kriteria::insert([
        [
            'kode' => 'C1',
            'nama' => 'Pedagogik',
            'bobot' => 0.30,
            'tipe' => 'benefit',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'kode' => 'C2',
            'nama' => 'Profesional',
            'bobot' => 0.25,
            'tipe' => 'benefit',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'kode' => 'C3',
            'nama' => 'Kepribadian',
            'bobot' => 0.25,
            'tipe' => 'benefit',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'kode' => 'C4',
            'nama' => 'Kehadiran',
            'bobot' => 0.20,
            'tipe' => 'benefit',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);

    return redirect('/kriteria')
        ->with('msg','Berhasil reset ke default C1–C4');
}




}
