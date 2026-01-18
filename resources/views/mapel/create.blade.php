<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl">
Tambah Mapel
</h2>
</x-slot>

<div class="py-6">
<div class="max-w-4xl mx-auto">

@if(session('msg'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-4">
{{ session('msg') }}
</div>
@endif


<!-- ========== FORM INPUT MANUAL ========== -->
<div class="bg-white p-5 rounded shadow mb-6">

<h3 class="font-semibold mb-3">
Input Manual
</h3>

<form action="/mapel" method="POST">
@csrf

<div class="mb-3">
<label>Nama Mapel</label>
<input name="nama_mapel" class="w-full border p-2 rounded">
</div>

<div class="mb-3">
<label>Kode</label>
<input name="kode" class="w-full border p-2 rounded">
</div>

<button class="bg-blue-600 text-white px-4 py-2 rounded">
Simpan
</button>

<a href="{{ route('mapel.index') }}"
class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
↩ Batal
</a>

</form>

</div>



<!-- ========== FORM IMPORT EXCEL ========== -->

<div class="bg-white p-5 rounded shadow">

<h3 class="font-semibold mb-3">
Import dari Excel
</h3>

<form action="/mapel-import" method="POST" enctype="multipart/form-data">

@csrf

<div class="mb-3">
<input type="file" name="file" required>
</div>

<div class="text-sm text-gray-500 mb-3">
Format: Kolom A = nama_mapel, Kolom B = kode
</div>

<button class="bg-green-600 text-white px-4 py-2 rounded">
Import Excel
</button>

</form>

</div>

</div>
</div>

</x-app-layout>
