<x-app-layout>

<x-slot name="header">
<div class="flex items-center gap-3">

    <img src="{{ asset('images/logo.png') }}" class="h-12 w-auto">

    <div>
        <h2 class="font-semibold text-lg text-green-800">
            SMK CITRA NEGARA
        </h2>

        <div class="text-xs text-gray-500">
            Sistem Pemilihan Guru Terbaik
        </div>
    </div>

</div>
</x-slot>

<div class="py-4">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

@if(auth()->user()->role == 'admin')

<!-- ========== STATISTIK MODERN ========== -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-6">

<!-- Card Guru -->
<div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-5 border border-green-100">
    <div class="flex items-center gap-4">
        <div class="p-3 bg-green-100 rounded-xl">🧑‍🏫</div>
        <div>
            <div class="text-sm text-gray-500">Total Guru</div>
            <div class="text-2xl font-bold text-green-700">
                {{ \App\Models\Guru::count() }}
            </div>
        </div>
    </div>
</div>

<!-- Card Kriteria -->
<div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-5 border border-green-100">
    <div class="flex items-center gap-4">
        <div class="p-3 bg-green-100 rounded-xl">📊</div>
        <div>
            <div class="text-sm text-gray-500">Total Kriteria</div>
            <div class="text-2xl font-bold text-green-700">
                {{ \App\Models\Kriteria::count() }}
            </div>
        </div>
    </div>
</div>

<!-- Card Nilai -->
<div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-5 border border-green-100">
    <div class="flex items-center gap-4">
        <div class="p-3 bg-green-100 rounded-xl">✏️</div>
        <div>
            <div class="text-sm text-gray-500">Total Penilaian</div>
            <div class="text-2xl font-bold text-green-700">
                {{ \App\Models\Nilai::count() }}
            </div>
        </div>
    </div>
</div>

<!-- Card TOPSIS -->
<div class="bg-gradient-to-r from-green-600 to-green-700 rounded-2xl shadow p-5 text-white">
    <div class="mb-2 text-sm opacity-90">Proses SPK</div>

    <a href="/topsis"
       class="block text-center bg-white text-green-700 py-2 rounded-xl font-semibold">
       Lihat Hasil TOPSIS →
    </a>
</div>

</div>

<!-- ===== BAGIAN GRAFIK ===== -->
<div class="grid md:grid-cols-2 gap-4">

<!-- RANKING 3 BESAR -->
<div class="bg-white shadow rounded p-4">

<h3 class="font-semibold mb-3 text-green-800">
🥇 Top 3 Guru Terbaik
</h3>

@php
$data = [];

try {
    $hasil = app(App\Http\Controllers\TopsisController::class)
            ->proses()
            ->getData();

    $data = $hasil['hasil'] ?? [];

} catch (\Exception $e) {
    $data = [];
}

$rank = 1;
@endphp

@if(count($data) == 0)

<div class="text-center text-gray-500 p-4">
Data belum cukup untuk perhitungan TOPSIS
</div>

@else

@foreach($data as $id=>$nilai)

@if($rank <= 3)

<div class="flex justify-between p-2 border-b">
<div>
#{{ $rank }}
{{ \App\Models\Guru::find($id)->nama ?? '-' }}
</div>

<div class="font-bold text-green-700">
{{ round($nilai,4) }}
</div>
</div>

@endif

@php $rank++; @endphp
@endforeach

@endif

</div>

<!-- GRAFIK BAR -->
<div class="bg-white shadow rounded p-4">

<h3 class="font-semibold mb-3 text-green-800">
📊 Grafik Nilai TOPSIS
</h3>

@if(count($data) == 0)

<div class="text-gray-500 text-center">
Belum ada data grafik
</div>

@else

@php $no=1; @endphp

@foreach($data as $id=>$nilai)

@if($no <= 5)

<div class="mb-2">

<div class="text-xs">
{{ \App\Models\Guru::find($id)->nama ?? '-' }}
</div>

<div class="w-full bg-gray-100 rounded">
<div class="bg-green-600 text-white text-xs p-1 rounded"
     style="width: {{ $nilai * 100 }}%">
{{ round($nilai,3) }}
</div>
</div>

</div>

@endif

@php $no++; @endphp
@endforeach

@endif

</div>

</div>

<!-- ========== MENU CEPAT ADMIN ========== -->
<div class="bg-white rounded-2xl shadow p-5 mt-6 border border-green-100">

<h3 class="font-semibold text-green-800 mb-4">
⚙ Menu Kelola Data
</h3>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

<a href="/guru"
class="p-4 border rounded-xl hover:bg-green-50 transition text-center">
🧑‍🏫<br>Kelola Guru
</a>

<a href="/kriteria"
class="p-4 border rounded-xl hover:bg-green-50 transition text-center">
📊<br>Kelola Kriteria
</a>

<a href="/nilai"
class="p-4 border rounded-xl hover:bg-green-50 transition text-center">
✏️<br>Input Nilai
</a>

<a href="/mapel"
class="p-4 border rounded-xl hover:bg-green-50 transition text-center">
📚<br>Kelola Mapel
</a>

</div>
</div>

@else

<!-- DASHBOARD KEPSEK -->
<div class="bg-white shadow rounded p-6 text-center max-w-2xl mx-auto">

<h3 class="text-xl font-semibold mb-2 text-green-800">
Hasil Pemilihan Guru Terbaik
</h3>

<a href="/topsis"
class="inline-block px-6 py-2 bg-green-600 text-white rounded">
Lihat Hasil
</a>

</div>

@endif

</div>
</div>

</x-app-layout>
