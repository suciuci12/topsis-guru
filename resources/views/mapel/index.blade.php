<x-app-layout>

<x-slot name="header">
<div class="flex justify-between items-center">

<h2 class="font-semibold text-xl text-gray-800">
📚 Data Mata Pelajaran
</h2>

<div class="flex gap-2">

<a href="{{ route('mapel.pdf') }}"
class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
Cetak PDF
</a>

<a href="{{ route('mapel.create') }}"
class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
+ Tambah Mapel
</a>

</div>

</div>
</x-slot>


<div class="py-6">
<div class="max-w-6xl mx-auto px-4">

@if(session('msg'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-4">
{{ session('msg') }}
</div>
@endif


<!-- ===== TABLE ===== -->
<div class="bg-white shadow rounded-xl overflow-hidden">

<table class="w-full">

<thead class="bg-gray-50">
<tr>
<th class="p-4 text-left w-12">No</th>
<th class="p-4 text-left">Nama Mapel</th>
<th class="p-4 text-left">Kode</th>
<th class="p-4 text-center w-40">Aksi</th>
</tr>
</thead>

<tbody>

@foreach($mapel as $m)

<tr class="border-t hover:bg-gray-50">

<td class="p-4">
{{ $loop->iteration }}
</td>

<td class="p-4 font-semibold">
{{ $m->nama_mapel }}
</td>

<td class="p-4">
{{ $m->kode }}
</td>

<td class="p-4">

<div class="flex gap-2 justify-center">

<!-- EDIT -->
<a href="{{ route('mapel.edit', $m->id) }}"
class="px-5 py-1 bg-blue-60 text-black-900 rounded-lg text-xs hover:bg-blue-100">
✏ Edit
</a>

<!-- DELETE -->
<form action="{{ route('mapel.destroy', $m->id) }}"
method="POST"
onsubmit="return confirm('Hapus mapel?')">

@csrf
@method('DELETE')

<button class="px-3 py-1 bg-red-50 text-red-700 rounded-lg text-xs hover:bg-red-100">
🗑 Hapus
</button>

</form>

</div>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>


</div>
</div>

</x-app-layout>
