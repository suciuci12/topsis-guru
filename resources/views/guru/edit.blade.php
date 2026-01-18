<x-app-layout>

<x-slot name="header">
<h2 class="text-xl font-semibold">
Edit Data Guru
</h2>
</x-slot>

<div class="py-6">
<div class="max-w-3xl mx-auto">

<div class="bg-white p-6 rounded-xl shadow">

<form action="/guru/{{ $guru->id }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label>Nama</label>
<input name="nama" value="{{ $guru->nama }}"
class="w-full border p-2 rounded">
</div>

<div class="mb-3">
<label>NIP</label>
<input name="nip" value="{{ $guru->nip }}"
class="w-full border p-2 rounded">
</div>

<div class="mb-3">
<label>Mapel</label>
<input name="mapel" value="{{ $guru->mapel }}"
class="w-full border p-2 rounded">
</div>

<div class="mb-3">
<label>Jenis Kelamin</label>
<select name="jenis_kelamin" class="w-full border p-2 rounded">

<option value="L" {{ $guru->jenis_kelamin=='L'?'selected':'' }}>
Laki-laki
</option>

<option value="P" {{ $guru->jenis_kelamin=='P'?'selected':'' }}>
Perempuan
</option>

</select>
</div>

<div class="mb-3">
<label>Telepon</label>
<input name="telepon" value="{{ $guru->telepon }}"
class="w-full border p-2 rounded">
</div>

<div class="mb-3">
<label>Alamat</label>
<textarea name="alamat"
class="w-full border p-2 rounded">{{ $guru->alamat }}</textarea>
</div>

<div class="mb-3">
<label>Status Sertifikasi</label>

<select name="status_sertifikasi"
class="w-full border p-2 rounded">

<option value="sudah"
{{ $guru->status_sertifikasi=='sudah'?'selected':'' }}>
Tersertifikasi
</option>

<option value="belum"
{{ $guru->status_sertifikasi=='belum'?'selected':'' }}>
Belum
</option>

</select>
</div>

<button class="bg-green-600 text-white px-4 py-2 rounded">
Update Data
</button>

</form>

</div>
</div>
</div>

</x-app-layout>
