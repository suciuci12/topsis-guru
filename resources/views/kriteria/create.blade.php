<x-app-layout>

<x-slot name="header">
<div class="flex items-center gap-3">

<h2 class="text-xl font-bold text-green-800">
➕ Tambah Kriteria
</h2>

</div>
</x-slot>


<div class="py-6">
<div class="max-w-3xl mx-auto px-4">

<div class="bg-white rounded-2xl shadow p-6">

<form action="/kriteria" method="POST" class="space-y-5">
@csrf


<!-- KODE -->
<div>
<label class="block font-semibold mb-1">
Kode Kriteria
</label>

<input name="kode"
class="w-full border rounded-lg p-3"
placeholder="Contoh: C1">

@error('kode')
<div class="text-red-600 text-sm">
{{ $message }}
</div>
@enderror

</div>


<!-- NAMA -->
<div>
<label class="block font-semibold mb-1">
Nama Kriteria
</label>

<input name="nama"
class="w-full border rounded-lg p-3"
placeholder="Contoh: Pedagogik">

@error('nama')
<div class="text-red-600 text-sm">
{{ $message }}
</div>
@enderror

</div>


<!-- BOBOT -->
<div>
<label class="block font-semibold mb-1">
Bobot
</label>

<input name="bobot" type="number" step="0.01"
class="w-full border rounded-lg p-3"
placeholder="Contoh: 0.30">

<small class="text-gray-500">
Gunakan desimal, total semua bobot idealnya = 1
</small>

@error('bobot')
<div class="text-red-600 text-sm">
{{ $message }}
</div>
@enderror

</div>


<!-- TIPE -->
<div>
<label class="block font-semibold mb-2">
Jenis Kriteria
</label>

<select name="tipe"
class="w-full border rounded-lg p-3">

<option value="benefit">Benefit</option>
<option value="cost">Cost</option>

</select>

</div>


<!-- BUTTON -->
<div class="flex justify-end gap-3 pt-4 border-t">

<a href="/kriteria"
class="px-5 py-2 border rounded-lg">
Batal
</a>

<button
class="px-5 py-2 bg-green-600 text-white rounded-lg">
Simpan
</button>

</div>


</form>
</div>

</div>
</div>

</x-app-layout>
