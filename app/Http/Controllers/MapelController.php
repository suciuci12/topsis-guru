<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\MapelImport;
use Maatwebsite\Excel\Facades\Excel;


class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::all();
        return view('mapel.index', compact('mapel'));
    }

    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'nip'  => 'required|unique:gurus',
        'mapel' => 'required'
    ]);

    $guru = Guru::create([
        'nama' => $request->nama,
        'nip' => $request->nip,
        'jenis_kelamin' => $request->jenis_kelamin,
        'telepon' => $request->telepon,
        'alamat' => $request->alamat,
        'status_sertifikasi' => $request->status_sertifikasi,
    ]);

    // 👉 SIMPAN KE TABEL PIVOT
    $guru->mapels()->attach($request->mapel);

    return redirect('/guru')->with('msg','Guru ditambah');
}

    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,csv'
    ]);

    Excel::import(new MapelImport, $request->file('file'));

    return back()->with('msg','Import data mapel berhasil');
}
public function cetakPdf()
{
    $mapel = Mapel::all();

    $pdf = Pdf::loadView('mapel.pdf', compact('mapel'))
              ->setPaper('A4','portrait');

    return $pdf->download('Data_Mapel.pdf');
}
public function edit($id)
{
    $mapel = Mapel::findOrFail($id);

    return view('mapel.edit', compact('mapel'));
}
public function destroy($id)
{
    Mapel::findOrFail($id)->delete();

    return redirect()->route('mapel.index')
        ->with('msg','Mapel berhasil dihapus');
}
public function update(Request $request, $id)
{
    $request->validate([
        'nama_mapel' => 'required',
        'kode'       => 'required'
    ]);

    $mapel = Mapel::findOrFail($id);

    $mapel->update([
        'nama_mapel' => $request->nama_mapel,
        'kode'       => $request->kode,
    ]);

    return redirect()->route('mapel.index')
        ->with('msg','Mapel berhasil diupdate');
}




}
