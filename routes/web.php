<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JioyController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginpelangganController;
use App\Http\Controllers\PelangganController;









/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [JioyController::class, 'index'])->name('/');
Route::post('/filterkategori/{id}', [JioyController::class, 'filterkategori']);
Route::get('/cari', [JioyController::class, 'cari'])->name('cari');
Route::post('/detail/{id}', [JioyController::class, 'detail']);








Route::get('/login/admin', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login/admin', [LoginController::class, 'auth']);
// Route::get('/login', [LoginpelangganController::class, 'index']);
Route::get('/login', [LoginpelangganController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginpelangganController::class, 'auth']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [PelangganController::class, 'create']);
Route::post('/register', [PelangganController::class, 'store']);
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy']);




Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/admin', function () {
        return view('admin/welcomeadmin');
    });
    Route::resource('produk', ProdukController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('kurir', KurirController::class);
    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::resource('pembelian', PembelianController::class);
    Route::get('/caripembelian', [PembelianController::class, 'caripembelian'])->name('caripembelian');
    Route::get('/adminprodukpesanan/{id}/{status}', [JioyController::class, 'adminprodukpesanan']);

    Route::resource('laporan', LaporanController::class);

    Route::post('/ubahstatus1/{id}', [JioyController::class, 'ubahstatus1']);
    Route::post('/ubahstatus2/{id}', [JioyController::class, 'ubahstatus2']);

    Route::post('/filterdate', [LaporanController::class, 'filterdate']);
    Route::get('/cetak', [LaporanController::class, 'cetak']);
    Route::post('/cetakbytanggal', [LaporanController::class, 'cetakbytanggal']);
});
Route::group(['middleware' => ['auth:pelanggan']], function () {
    Route::get('/checkout', [JioyController::class, 'checkout']);
    Route::delete('/checkout/{id}', [JioyController::class, 'delete']);
    Route::post('/keranjang/{id}', [JioyController::class, 'keranjang']);
    // Route::post('/detail/{id}', [JioyController::class, 'detail']);
    Route::post('/checkoutkonfirmasi', [JioyController::class, 'konfirmasi']);
    Route::post('/ubahjumlah', [JioyController::class, 'jumlah']);
    Route::get('/profil', [JioyController::class, 'profil'])->name('/profil');
    Route::get('/produkpesanan/{id}', [JioyController::class, 'produkpesanan']);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
