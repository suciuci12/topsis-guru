<x-app-layout>

<x-slot name="header">
<h2 class="text-xl font-semibold text-green-800">
📁 Riwayat Validasi Kepala Sekolah
</h2>
</x-slot>

<div class="py-6 bg-green-50 min-h-screen">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="bg-white rounded-2xl shadow p-5">

<h3 class="font-semibold mb-3 text-green-800">
Daftar Riwayat Persetujuan
</h3>

<table class="w-full">
<thead>
<tr class="bg-green-600 text-white">
    <th class="p-3 text-left">Periode</th>
    <th class="p-3 text-left">Status</th>
    <th class="p-3 text-left">Catatan</th>
    <th class="p-3 text-left">Tanggal</th>
</tr>
</thead>

<tbody>

@foreach($data as $d)

<tr class="border-b hover:bg-green-50">

<td class="p-3">
    {{ $d->periode }}
</td>

<td class="p-3">

@if($d->status == 'disetujui')
<span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">
    ✔ Disetujui
</span>

@elseif($d->status == 'ditolak')
<span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">
    ✖ Ditolak
</span>

@else
<span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">
    ⏳ Menunggu
</span>
@endif

</td>

<td class="p-3">
{{ $d->catatan ?? '-' }}
</td>

<td class="p-3 text-sm text-gray-500">
{{ $d->created_at->format('d M Y H:i') }}
</td>

</tr>

@endforeach

</tbody>
</table>

</div>

</div>
</div>

</x-app-layout>
