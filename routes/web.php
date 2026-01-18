<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TopsisController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\MapelController;

use App\Models\Mapel;   // ✅ INI WAJIB!

/*
|--------------------------------------------------------------------------
| ROUTE PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if(auth()->user()->role == 'kepsek'){
        return redirect('/kepsek');
    }

    return view('dashboard');

})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| ROUTE ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:admin'])->group(function(){

    // ===== CRUD UTAMA =====
    Route::resource('guru', GuruController::class);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('nilai', NilaiController::class);

    // ===== CRUD MAPEL =====
    Route::resource('mapel', MapelController::class);

    // ===== FITUR PDF =====
    Route::get('/mapel-pdf',
        [MapelController::class,'cetakPdf'])
        ->name('mapel.pdf');

    Route::get('/guru-pdf',
        [GuruController::class,'cetakPdf'])
        ->name('guru.pdf');

    Route::get('/kriteria-pdf',
        [KriteriaController::class,'cetakPdf'])
        ->name('kriteria.pdf');

    // ===== RESET DEFAULT KRITERIA =====
    Route::post('/kriteria-reset',
    [KriteriaController::class,'resetDefault'])
    ->name('kriteria.reset');


    // ===== API SEARCH MAPEL (autocomplete) =====
    Route::get('/api/search-mapel', function(){

        $q = request('q');

        return Mapel::where('nama_mapel','like',"%$q%")
            ->get(['id','nama_mapel']);

    });

});


/*
|--------------------------------------------------------------------------
| ROUTE ADMIN & KEPSEK (LIHAT HASIL)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function(){

    Route::get('/topsis',
        [TopsisController::class,'proses'])
        ->name('topsis.proses');

});

/*
|--------------------------------------------------------------------------
| ROUTE KEPSEK
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:kepsek'])->group(function(){

    Route::get('/kepsek',
        [KepsekController::class,'dashboard']);

    Route::post('/kepsek/setujui',
        [KepsekController::class,'setujui']);

    Route::post('/kepsek/tolak',
        [KepsekController::class,'tolak']);

    Route::get('/kepsek/riwayat',
        [KepsekController::class,'riwayat']);

});

require __DIR__.'/auth.php';
