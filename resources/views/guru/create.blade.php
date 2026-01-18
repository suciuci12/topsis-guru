<x-app-layout>

<x-slot name="header">
<div class="flex items-center gap-3">
    <div class="p-2 bg-green-100 rounded-lg">
        🧑‍🏫
    </div>
    <h2 class="text-2xl font-bold text-gray-800">
        Tambah Data Guru
    </h2>
</div>
</x-slot>

<div class="py-8">
<div class="max-w-4xl mx-auto px-6">

<!-- CARD UTAMA -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100">

<!-- HEADER CARD -->
<div class="p-6 border-b">
    <p class="text-gray-500 text-sm">
        Lengkapi informasi guru dengan benar dan valid
    </p>
</div>

<form action="/guru" method="POST" class="p-6 space-y-5">
@csrf

<!-- GRID 2 KOLOM -->
<div class="grid md:grid-cols-2 gap-5">

    <!-- NAMA -->
    <div>
        <label class="block text-sm font-semibold mb-2">
            Nama Lengkap
        </label>
        <input name="nama"
            class="w-full px-4 py-3 rounded-xl border
            focus:ring-2 focus:ring-green-400
            focus:border-green-400 transition">
    </div>

    <!-- NIP -->
    <div>
        <label class="block text-sm font-semibold mb-2">
            NIP
        </label>
        <input name="nip"
            class="w-full px-4 py-3 rounded-xl border
            focus:ring-2 focus:ring-green-400">
    </div>

    <!-- MAPEL -->
<!-- MAPEL -->
<div class="mb-4">
<label class="font-semibold block mb-2">
Mata Pelajaran
</label>

<select id="mapel-input" name="mapel[]" multiple
class="w-full border rounded p-2">
</select>

<small class="text-gray-500">
Ketik untuk mencari & pilih beberapa mapel
</small>
</div>



    <!-- JK -->
    <div>
        <label class="block text-sm font-semibold mb-2">
            Jenis Kelamin
        </label>
        <select name="jenis_kelamin"
            class="w-full px-4 py-3 rounded-xl border">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>

</div>

<!-- TELEPON -->
<div>
<label class="block text-sm font-semibold mb-2">
    Telepon
</label>
<input name="telepon"
class="w-full px-4 py-3 rounded-xl border">
</div>

<!-- ALAMAT -->
<div>
<label class="block text-sm font-semibold mb-2">
    Alamat
</label>
<textarea name="alamat" rows="3"
class="w-full px-4 py-3 rounded-xl border"></textarea>
</div>

<!-- STATUS -->
<div>
<label class="block text-sm font-semibold mb-2">
    Status Sertifikasi
</label>

<div class="flex gap-4">

<label class="flex items-center gap-2
    px-4 py-3 border rounded-xl cursor-pointer
    hover:bg-green-50 transition">
<input type="radio" name="status_sertifikasi"
value="sudah">
Tersertifikasi
</label>

<label class="flex items-center gap-2
    px-4 py-3 border rounded-xl cursor-pointer">
<input type="radio" name="status_sertifikasi"
value="belum">
Belum
</label>

</div>
</div>

<!-- FOOTER ACTION -->
<div class="flex justify-end gap-3 pt-5 border-t">

<a href="/guru"
class="px-6 py-3 rounded-lg
border border-gray-300
text-gray-700 text-sm
hover:bg-gray-50">
Kembali
</a>

<button
class="px-6 py-3 rounded-lg
bg-green-600 text-white text-sm
hover:bg-green-700">
Simpan
</button>

</div>



</form>
</div>
</div>
</div>

</x-app-layout>
<script>

new TomSelect('#mapel-input',{

    plugins: ['remove_button'],

    maxItems: null,

    valueField: 'id',
    labelField: 'nama_mapel',
    searchField: 'nama_mapel',

    load: function(query, callback) {

        fetch('/api/search-mapel?q=' + query)
        .then(response => response.json())
        .then(json => {
            callback(json);
        });

    },

    create: false

});

</script>
