<x-app-layout>

<x-slot name="header">

<div class="flex justify-between items-center">

<h2 class="text-xl font-bold">
📊 Kelola Kriteria
</h2>

<div class="flex gap-2">

<a href="/kriteria/create"
class="bg-green-600 text-white px-4 py-2 rounded">
+ Tambah
</a>

<a href="/kriteria-pdf"
class="bg-red-600 text-white px-4 py-2 rounded">
Cetak PDF
</a>

<form action="{{ route('kriteria.reset') }}" method="POST">

@csrf

<button class="bg-yellow-500 text-white px-4 py-2 rounded">
Reset Default C1–C4
</button>

</form>


</div>

</div>

</x-slot>



<div class="py-6">
<div class="max-w-5xl mx-auto px-4">

@if(session('msg'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-4">
{{ session('msg') }}
</div>
@endif


<div class="bg-white rounded-2xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-green-600 text-white">
<tr>
<th class="p-3 text-center w-16">No</th>
<th class="p-3 text-left">Kode</th>
<th class="p-3 text-left">Nama Kriteria</th>
<th class="p-3 text-center">Bobot</th>
<th class="p-3 text-center">Jenis</th>
<th class="p-3 text-center w-40">Aksi</th>
</tr>
</thead>

<tbody>

@foreach($kriteria as $k)

<tr class="border-b hover:bg-green-50">

<td class="p-3 text-center">
{{ $loop->iteration }}
</td>

<td class="p-3 font-semibold">
{{ $k->kode }}
</td>

<td class="p-3">
{{ $k->nama }}
</td>

<td class="p-3 text-center">
{{ $k->bobot }}
</td>

<td class="p-3 text-center">
@if($k->tipe == 'benefit')
<span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">
Benefit
</span>
@else
<span class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs">
Cost
</span>
@endif
</td>


<!-- ===== AKSI ===== -->
<td class="p-3">

<div class="flex gap-2 justify-center">

<!-- EDIT -->
<a href="/kriteria/{{ $k->id }}/edit"
class="px-3 py-1 bg-blue-100 text-blue-700 rounded text-sm hover:bg-blue-200">
✏ Edit
</a>


<!-- HAPUS -->
<form action="/kriteria/{{ $k->id }}"
method="POST"
onsubmit="return confirm('Hapus kriteria ini?')">

@csrf
@method('DELETE')

<button
class="px-3 py-1 bg-red-100 text-red-700 rounded text-sm hover:bg-red-200">
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
