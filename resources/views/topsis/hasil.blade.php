<x-app-layout>

<x-slot name="header">
<div class="flex justify-between items-center">

<h2 class="text-xl font-bold text-green-800">
📊 Hasil Perhitungan TOPSIS
</h2>

<a href="/dashboard"
class="px-4 py-2 bg-gray-200 rounded-lg text-sm">
← Kembali
</a>

</div>
</x-slot>


<div class="py-6">
<div class="max-w-6xl mx-auto px-4">

<div class="bg-white rounded-2xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-green-600 text-white">
<tr>
<th class="p-3 text-center w-20">Ranking</th>
<th class="p-3 text-left">Nama Guru</th>
<th class="p-3 text-center">Nilai Preferensi</th>
<th class="p-3 text-center w-40">Aksi</th>
</tr>
</thead>

<tbody>

@php $no = 1; @endphp

@foreach($hasil as $id => $nilai)

@php
$g = $guru->where('id',$id)->first();
@endphp

<tr class="border-b hover:bg-green-50">

<!-- RANKING -->
<td class="p-3 text-center font-semibold">
#{{ $no++ }}
</td>


<!-- NAMA -->
<td class="p-3">
{{ $g ? $g->nama : 'Data Tidak Ditemukan' }}
</td>


<!-- NILAI -->
<td class="p-3 text-center font-bold text-green-700">
{{ round($nilai,4) }}
</td>


<!-- AKSI -->
<td class="p-3">

<div class="flex gap-2 justify-center">

<!-- EDIT -->
<a href="/guru/{{ $id }}/edit"
class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm hover:bg-blue-200">
✏ Edit
</a>


<!-- HAPUS -->
<form action="/guru/{{ $id }}"
method="POST"
onsubmit="return confirm('Yakin hapus guru ini?')">

@csrf
@method('DELETE')

<button
class="px-3 py-1 bg-red-100 text-red-700 rounded-lg text-sm hover:bg-red-200">
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



<!-- CATATAN -->
<div class="mt-4 text-sm text-gray-500">
* Ranking diurutkan berdasarkan nilai preferensi terbesar
</div>



</div>
</div>

</x-app-layout>
