<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('/produk', ProdukController::class);
    Route::resource('/transaksi', TransaksiController::class);
    Route::get('/user/android', [UserController::class, 'android']);
    Route::get('/user/ios', [UserController::class, 'ios']);
    Route::resource('/user', UserController::class);
    Route::resource('/akun', AkunController::class);
    Route::resource('/keranjang', KeranjangController::class);
    Route::post('/user/cari', [UserController::class, 'cari']);
    Route::get('admin/produk', [AdminController::class, 'produk']);
    Route::get('admin/produk/tambah', [AdminController::class, 'tambah_produk']);
    Route::post('admin/produk/insert', [AdminController::class, 'insert_produk']);
    Route::get('admin/produk/edit/{admin}', [AdminController::class, 'edit_produk']);
    Route::post('admin/produk/update', [AdminController::class, 'update_produk']);
    Route::delete('admin/produk/destroy/{admin}', [AdminController::class, 'destroy_produk']);
    Route::get('admin/transaksi/status/{admin}', [AdminController::class, 'update_status']);
    Route::get('admin/transaksi', [AdminController::class, 'transaksi']);
    Route::resource('/admin', AdminController::class);
    // Route::get('/');
});
