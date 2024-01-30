<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiDetailController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
Route::post('/register-proses',[LoginController::class,'register_proses'])->name('register-proses');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix'=> 'admin','middleware'=> ['auth'], 'as' => 'admin.'],function(){
Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard')->middleware('userAkses:admin');


Route::get('/kategori',[KategoriController::class,'index'])->name('kategori')->middleware('userAkses:admin');
Route::get('kategori/create',[KategoriController::class,'create'])->name('kategori.create')->middleware('userAkses:admin');
Route::post('kategori/store',[KategoriController::class,'store'])->name('kategori.store');
Route::get('kategori/edit/{id}',[KategoriController::class,'edit'])->name('kategori.edit')->middleware('userAkses:admin');
Route::put('kategori/update/{id}',[KategoriController::class,'update'])->name('kategori.update');
Route::delete('kategori/destroy/{id}',[KategoriController::class,'destroy'])->name('kategori.destroy');

Route::get('/produk',[ProdukController::class,'index'])->name('produk')->middleware('userAkses:admin');
Route::get('produk/create',[ProdukController::class,'create'])->name('produk.create')->middleware('userAkses:admin');
Route::post('produk/store',[ProdukController::class,'store'])->name('produk.store');
Route::get('produk/edit/{id}',[ProdukController::class,'edit'])->name('produk.edit')->middleware('userAkses:admin');
Route::put('produk/update/{id}',[ProdukController::class,'update'])->name('produk.update');
Route::delete('produk/destroy/{id}',[ProdukController::class,'destroy'])->name('produk.destroy');

Route::get('/transaksi',[TransaksiController::class,'index'])->name('transaksi')->middleware('userAkses:admin');
Route::get('transaksi/create',[TransaksiController::class,'create'])->name('transaksi.create')->middleware('userAkses:admin');
Route::post('transaksi/store',[TransaksiController::class,'store'])->name('transaksi.store');
Route::get('transaksi/edit/{id}',[TransaksiController::class,'edit'])->name('transaksi.edit')->middleware('userAkses:admin');
Route::put('transaksi/update/{id}',[TransaksiController::class,'update'])->name('transaksi.update');
Route::delete('transaksi/destroy/{id}',[TransaksiController::class,'destroy'])->name('transaksi.destroy');

Route::get('/transaksidetail',[TransaksiDetailController::class,'index'])->name('index')->middleware('userAkses:admin');
Route::post('transaksidetail/create',[TransaksiDetailController::class,'create'])->name('transaksidetail.create')->middleware('userAkses:admin');

Route::get('transaksidetail/selesai/{id}',[TransaksiDetailController::class,'selesai'])->name('transaksidetail.selesai');

Route::post('transaksidetail/store',[TransaksiDetailController::class,'store'])->name('transaksidetail.store');
Route::get('/admin/transaksidetail/edit/{id}', [TransaksiDetailController::class, 'edit'])->name('admin.transaksi.edit')->middleware('userAkses:admin');
Route::put('transaksidetail/update/{id}',[TransaksiDetailController::class,'update'])->name('transaksidetail.update');
Route::delete('/transaksidetail/delete/{id}', [TransaksiDetailController::class, 'delete'])->name('transaksidetail.delete');


Route::get('/admin/generate-pdf/{id}', 'PDFController@generatePDF')->name('admin.generate-pdf');
Route::put('/admin/generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('admin.generate-pdf');


Route::get('pengguna/dashboard',[PenggunaController::class,'dashboard'])->name('pengguna.dashboard')->middleware('userAkses:pengguna');
Route::get('pengguna/index',[PenggunaController::class,'index'])->name('pengguna.index')->middleware('userAkses:pengguna');


Route::get('/user',[HomeController::class,'index'])->name('index')->middleware('userAkses:admin');
Route::get('/create',[HomeController::class,'create'])->name('user.create')->middleware('userAkses:admin');
Route::post('/store',[HomeController::class,'store'])->name('user.store');
Route::get('/edit/{id}',[HomeController::class,'edit'])->name('user.edit')->middleware('userAkses:admin');
Route::put('/update/{id}',[HomeController::class,'update'])->name('user.update');
Route::delete('/delete/{id}',[HomeController::class,'delete'])->name('user.delete');

// PDF AJG
Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate-pdf');
});
