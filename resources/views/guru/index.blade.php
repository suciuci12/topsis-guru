<x-app-layout>

<x-slot name="header">

<div class="flex justify-between items-center">

<h2 class="text-xl font-bold text-gray-800">
👨‍🏫 Data Guru
</h2>

<div class="flex gap-2">

<!-- TOMBOL CETAK PDF -->
<a href="/guru-pdf"
class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-sm transition shadow">
🖨 Cetak PDF
</a>

<a href="/guru/create"
class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm transition shadow">
+ Tambah Guru
</a>

</div>

</div>

</x-slot>

<div class="py-6 bg-gradient-to-br from-green-50 to-white min-h-screen">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<!-- SEARCH -->
<div class="mb-4">
<input id="cariGuru"
placeholder="🔍 Cari nama guru..."
class="w-full md:w-64 px-3 py-2 border rounded-xl text-sm focus:ring-2 focus:ring-green-300 outline-none">
</div>

<!-- TABLE -->
<div class="bg-white rounded-2xl shadow-sm overflow-auto">

<table class="w-full text-sm">

<thead>
<tr class="bg-green-600 text-white">
<th class="p-4 text-left w-12">No</th>
<th class="p-4 text-left">Nama</th>
<th class="p-4 text-left">NIP</th>
<th class="p-4 text-left w-64">Mapel</th>
<th class="p-4 text-left">JK</th>
<th class="p-4 text-left">Telepon</th>
<th class="p-4 text-left">Status</th>
<th class="p-4 text-left">Alamat</th>
<th class="p-4 text-left w-32">Aksi</th>
</tr>
</thead>

<tbody>

@foreach($guru as $g)

<tr class="border-b hover:bg-green-50 transition data-guru">

<!-- NOMOR URUT -->
<td class="p-4 text-gray-400 font-medium">
{{ $loop->iteration }}
</td>

<td class="p-4 nama-guru font-semibold text-gray-800">
{{ $g->nama }}
</td>

<td class="p-4 text-gray-500">
{{ $g->nip }}
</td>

<!-- MAPEL MULTI -->
<td class="p-4">
@if($g->mapels->count() > 0)

<div class="flex flex-wrap gap-1">

@foreach($g->mapels as $m)

<span class="inline-flex items-center gap-1
bg-emerald-100 text-emerald-700
text-xs font-medium
px-2.5 py-1 rounded-lg border border-emerald-200">

📘 {{ $m->nama_mapel }}

</span>

@endforeach

</div>

@else

<span class="text-gray-400 text-xs italic">
Belum ada mapel
</span>

@endif
</td>


<!-- JK -->
<td class="p-4">
@if($g->jenis_kelamin == 'L')
<span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs">
Laki-laki
</span>
@else
<span class="px-2 py-1 bg-pink-100 text-pink-700 rounded-lg text-xs">
Perempuan
</span>
@endif
</td>

<td class="p-4 text-gray-600">
{{ $g->telepon ?? '-' }}
</td>

<!-- STATUS SERTIFIKASI -->
<td class="p-4">

@if($g->status_sertifikasi == 'sudah')

<span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs">
✔ Tersertifikasi
</span>

@else

<span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs">
✖ Belum
</span>

@endif

</td>

<td class="p-4 text-gray-600">
{{ $g->alamat ?? '-' }}
</td>

<td class="p-4">
<div class="flex gap-2">

<a href="/guru/{{ $g->id }}/edit"
class="px-3 py-1 bg-blue-50 text-blue-700 rounded-lg text-xs hover:bg-blue-100">
✏ Edit
</a>

<form action="/guru/{{ $g->id }}" method="POST">
@csrf
@method('DELETE')

<button onclick="return confirm('Yakin hapus data guru?')"
class="px-3 py-1 bg-red-50 text-red-700 rounded-lg text-xs hover:bg-red-100">
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

<!-- SEARCH SCRIPT -->
<script>
document.getElementById('cariGuru').addEventListener('keyup', function(){

let f = this.value.toLowerCase();

document.querySelectorAll('.data-guru').forEach(b => {

let nama = b.querySelector('.nama-guru')
.innerText.toLowerCase();

b.style.display = nama.includes(f) ? '' : 'none';

});

});
</script>

</x-app-layout>
