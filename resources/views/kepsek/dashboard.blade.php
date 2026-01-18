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

<div class="py-6 bg-green-50 min-h-screen">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<!-- ========== STATISTIK ========== -->
<div class="grid md:grid-cols-3 gap-4 mb-4">

<div class="bg-white p-4 rounded-xl shadow border-l-4 border-green-600">
<div class="text-gray-500">Total Guru</div>
<div class="text-2xl font-bold text-green-700">
{{ \App\Models\Guru::count() }}
</div>
</div>

<div class="bg-white p-4 rounded-xl shadow border-l-4 border-green-600">
<div class="text-gray-500">Total Kriteria</div>
<div class="text-2xl font-bold text-green-700">
{{ \App\Models\Kriteria::count() }}
</div>
</div>

<div class="bg-white p-4 rounded-xl shadow border-l-4 border-green-600">
<div class="text-gray-500">Total Nilai</div>
<div class="text-2xl font-bold text-green-700">
{{ \App\Models\Nilai::count() }}
</div>
</div>

</div>

<!-- ========== AKSI UTAMA ========== -->
<div class="grid md:grid-cols-2 gap-4">

<!-- VALIDASI -->
<div class="bg-white p-5 rounded-xl shadow">

<h3 class="font-semibold text-green-800 mb-2">
✔ Validasi Hasil TOPSIS
</h3>

<form method="POST" action="/kepsek/setujui">
@csrf

<textarea name="catatan"
class="w-full border rounded p-2 mb-2"
placeholder="Berikan catatan..."></textarea>

<div class="flex gap-2">

<button class="bg-green-600 text-white px-4 py-2 rounded">
Setujui
</button>

</form>

<form method="POST" action="/kepsek/tolak">
@csrf

<button class="bg-red-600 text-white px-4 py-2 rounded">
Tolak
</button>

</form>

</div>
</div>

<!-- MENU CEPAT -->
<div class="bg-white p-5 rounded-xl shadow">

<h3 class="font-semibold text-green-800 mb-2">
Menu Kepsek
</h3>

<div class="grid grid-cols-1 gap-2">

<a href="/topsis"
class="block p-3 bg-green-50 rounded hover:bg-green-100">
📊 Lihat Ranking
</a>

<a href="/topsis/cetak"
class="block p-3 bg-green-50 rounded hover:bg-green-100">
🖨 Cetak Laporan PDF
</a>

<a href="/kepsek/riwayat"
class="block p-3 bg-green-50 rounded hover:bg-green-100">
📁 Riwayat Validasi
</a>

</div>

</div>

</div>

</div>
</div>

</x-app-layout>
