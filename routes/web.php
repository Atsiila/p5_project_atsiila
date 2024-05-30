<?php
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $berita = Berita::all();
    return view('welcome', compact ('berita'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// backend / route untuk crud
Route::group(['prefix' => 'admin'], function () {
    //penulis
    Route::resource('penulis', App\Http\Controllers\PenulisController::class)->middleware('auth');
    Route::post('penulis/export-penulis', [App\Http\Controllers\PenulisController::class, 'viewPDF'])->name('penulis.view-pdf');

    // kategori
    Route::resource('kategori', App\Http\Controllers\KategoriController::class)->middleware('auth');
    Route::post('kategori/export-kategori', [App\Http\Controllers\KategoriController::class, 'viewPDF'])->name('kategori.view-pdf');

    Route::resource('berita', App\Http\Controllers\BeritaController::class)->middleware('auth');
    Route::post('berita/export-berita', [App\Http\Controllers\BeritaController::class, 'viewPDF'])->name('berita.view-pdf');


    // untuk halaman guest(pengunjung) / tamu

});
Route::get('/', [FrontController::class, 'index']);
Route::get('berita', [FrontController::class, 'berita']);
Route::get('kategori', [FrontController::class, 'berita']);
Route::get('berita/{id}', [FrontController::class, 'detailBerita']);
Route::get('about', [FrontController::class, 'about']);
Route::get('/berita/merek/{id}', [FrontController::class, 'filterByMerek'])->name('berita.filterByMerek');
