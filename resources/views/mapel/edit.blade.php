<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800">
✏️ Edit Mata Pelajaran
</h2>
</x-slot>

<div class="py-6">
<div class="max-w-3xl mx-auto px-4">

<div class="bg-white p-6 rounded-xl shadow">

<form action="{{ route('mapel.update', $mapel->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-4">
<label class="block mb-1 font-semibold">Nama Mapel</label>

<input type="text"
       name="nama_mapel"
       value="{{ $mapel->nama_mapel }}"
       class="w-full border p-2 rounded">

@error('nama_mapel')
<div class="text-red-600 text-sm">{{ $message }}</div>
@enderror
</div>


<div class="mb-4">
<label class="block mb-1 font-semibold">Kode Mapel</label>

<input type="text"
       name="kode"
       value="{{ $mapel->kode }}"
       class="w-full border p-2 rounded">

@error('kode')
<div class="text-red-600 text-sm">{{ $message }}</div>
@enderror
</div>


<div class="flex gap-2 mt-6">

<button type="submit"
class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
💾 Simpan Perubahan
</button>

<a href="{{ route('mapel.index') }}"
class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
↩ Batal
</a>

</div>

</form>

</div>

</div>
</div>

</x-app-layout>
