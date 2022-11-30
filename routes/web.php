<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiMobilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\TransaksiPembayaranController;
use App\Http\Controllers\TransaksiRiwayatController;
use App\Http\Controllers\ResetPasswordController;
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

//Route Register
Route::get('register',[RegisterController::class, 'register'])->middleware('guest');
Route::post('/register/akun',[RegisterController::class, 'post_register'])->middleware('guest');

//Route Auth
Route::get('/',[LoginController::class, 'auth'])->name('login')->middleware('guest');
Route::post('/post/auth',[LoginController::class, 'post_auth'])->middleware('guest');

//Route lupa password by email
Route::get('/lupa/password',[ResetPasswordController::class, 'lupa_password'])->middleware('guest');
Route::post('/post/reset/password', [ResetPasswordController::class, 'post_reset_password'])->middleware('guest');
Route::get('/reset/password/get/{token}', [ResetPasswordController::class, 'reset_password_get'])->middleware('guest');
Route::post('/reset/password/post', [ResetPasswordController::class, 'reset_password_post'])->middleware('guest');

//Route Logout
Route::get('logout',[LoginController::class, 'logout'])->middleware('auth');

//Route Home
Route::get('home',[HomeController::class, 'home'])->middleware('auth');

//Route Admin
Route::get('/master/admin',[AdminController::class, 'admin'])->middleware('auth');
Route::post('/post/admin',[AdminController::class, 'post_admin'])->middleware('auth');
Route::post('/ubah/status/{id}',[AdminController::class, 'ubah_status'])->middleware('auth');

//Route Ubah status
Route::get('/changeStatus',[AdminController::class, 'ubah_status'])->middleware('auth');


//Route Master Merek
Route::get('/master/merek',[MerekController::class, 'get_merek'])->middleware('auth');
Route::post('/post/merek',[MerekController::class, 'post_merek'])->middleware('auth');
Route::post('/update/merek/{id}',[MerekController::class, 'update_merek'])->middleware('auth');
Route::get('/hapus/merek/{id}',[MerekController::class, 'delete_merek'])->middleware('auth');

//Route Master Jenis Mobil
Route::get('/master/jenis',[JenisController::class, 'get_jenis'])->middleware('auth');
Route::post('/post/jenis',[JenisController::class, 'post_jenis'])->middleware('auth');
Route::post('/update/jenis/mobil/{id}',[JenisController::class, 'update_jenis'])->middleware('auth');
Route::get('/hapus/jenis/{id}',[JenisController::class, 'delete_jenis'])->middleware('auth');

//Route Mobil
Route::get('/master/mobil',[MobilController::class, 'get_mobil'])->middleware('auth');
Route::post('/post/mobil',[MobilController::class, 'post_mobil'])->middleware('auth');
Route::get('/edit/mobil/{id}',[MobilController::class, 'edit_mobil'])->middleware('auth');
Route::post('/ubah/data/mobil/{id}',[MobilController::class, 'update_mobil'])->middleware('auth');
Route::get('/detail/mobil/{id}',[MobilController::class, 'detail_mobil'])->middleware('auth');
Route::get('/hapus/mobil/{id}',[MobilController::class, 'hapus_mobil'])->middleware('auth');
Route::get('/daftar/mobil',[MobilController::class, 'get_daftar_mobil'])->middleware('auth');
Route::get('/order/mobil/{id}',[MobilController::class, 'order_mobil'])->middleware('auth');

//Route transaksi sewa mobil
Route::post('/sewa/sekarang/{id}',[TransaksiMobilController::class, 'sewa_sekarang'])->middleware('auth');

//Route Status Mobil keluar
Route::get('/mobil/keluar',[TransaksiMobilController::class, 'mobil_keluar'])->middleware('auth');

//Route Status Mobil pendding
Route::get('/mobil/pendding',[TransaksiMobilController::class, 'mobil_pendding'])->middleware('auth');
//Rouute Mobil kembali
Route::get('/mobil/kembali',[TransaksiMobilController::class, 'mobil_kembali'])->middleware('auth');


//Route Pesanan
Route::get('/pesanan/saya',[TransaksiMobilController::class, 'pesanan'])->middleware('auth');
Route::get('/batal/pembayaran/{id}',[TransaksiMobilController::class, 'batal_pembayaran'])->middleware('auth');



//Route payment getwey
Route::get('/payment/{id}',[BayarController::class, 'payment'])->middleware('auth');
Route::post('/payment/getwey/{id}',[BayarController::class, 'payment_post'])->middleware('auth');

//Transaksi Pembayaran
Route::get('/transaksi/pembayaran',[TransaksiPembayaranController::class, 'transaksi_pembayaran'])->middleware('auth');
//Cetak Bukti pembayaran
Route::get('/cetak/bukti/pembayaran/{id}',[TransaksiPembayaranController::class, 'cetak_pdf'])->middleware('auth');

//Route Transaksi riwayat
Route::get('/riwayat/transaksi',[TransaksiRiwayatController::class, 'transaksi'])->middleware('auth');

//Route Konfrimasi pengembalian
Route::post('/konfirmasi/pengembalian/{id}',[TransaksiRiwayatController::class, 'konfirmasi'])->middleware('auth');

//Route komentar
Route::get('/komentar/{id}',[KomentarController::class, 'komentar'])->middleware('auth');
Route::post('/kirim/komentar',[KomentarController::class, 'kirim_komentar'])->middleware('auth');
Route::post('/balas/komentar/caild1',[KomentarController::class, 'balas_komentar_caild1'])->middleware('auth');
Route::post('/balas/komentar/caild2',[KomentarController::class, 'balas_komentar_caild2'])->middleware('auth');
Route::get('/hapus/komentar/{id}',[KomentarController::class, 'hapus_komentar'])->middleware('auth');

//Route Akun User
Route::get('/akun/anda',[AkunController::class, 'akun'])->middleware('auth');
Route::post('/ubah/foto',[AkunController::class, 'ubah_foto'])->middleware('auth');
Route::post('/update/profil/',[AkunController::class, 'update_profil'])->middleware('auth');

//Route Ubah password
Route::put('/ubah/password', [AkunController::class, 'ubah_password'])->middleware('auth');

