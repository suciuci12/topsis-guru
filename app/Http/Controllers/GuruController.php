<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;
use PDF;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::orderBy('id','asc')->get();
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
         $mapels = Mapel::all();
    return view('guru.create', compact('mapels'));
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

    // SIMPAN MULTI MAPEL
    $guru->mapels()->sync($request->mapel);

    return redirect('/guru')
        ->with('msg','Guru berhasil ditambahkan');
}




    public function edit($id)
    {
        $guru = Guru::findOrFail($id);

        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required',
            'nip'   => 'required|unique:gurus,nip,'.$id,
            'mapel' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'status_sertifikasi' => 'required'
        ]);

        $guru = Guru::findOrFail($id);

        $guru->update([
            'nama'  => $request->nama,
            'nip'   => $request->nip,
            'mapel' => $request->mapel,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'status_sertifikasi' => $request->status_sertifikasi
        ]);

        return redirect('/guru')
            ->with('msg','Data Guru berhasil diupdate');
            $guru->mapels()->sync($request->mapel_id);

    }

    public function destroy($id)
    {
        Guru::findOrFail($id)->delete();

        return back()->with('msg','Guru berhasil dihapus');
    }
    public function cetakPdf()
{
    $guru = Guru::with('mapels')->get();

    $pdf = PDF::loadView('guru.pdf', compact('guru'));

    return $pdf->download('data-guru.pdf');
}

}
