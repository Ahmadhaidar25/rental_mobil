<?php

namespace App\Http\Controllers;

use App\Models\transaksimobil;
use App\Models\transaksipembayaran;
use App\Models\mobil;
use App\Models\User;
use carbon\carbon;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{

 public function home()
 {
   //count pesanan belum di bayar
   $pesanan_belum_dibayar = transaksimobil::where('user_id', Auth::user()->id)->wherestatus_transaksi(1)->count();

   //count pesanan sudah di bayar
   $pesanan_sudah_dibayar = transaksimobil::where('user_id', Auth::user()->id)->wherestatus_transaksi(2)->count();

   //count mobil keluar
  
   $mobil_keluar = transaksimobil::whereDay('created_at',date('d'))->wherestatus_transaksi(2)->count();
   
   //count mobil pending
   $mobil_pending = transaksimobil::wherestatus_transaksi(1)->count();  

   //countt status mobil
   $mobil_kembali = mobil::wherestatus(3)->count();

   //Count riwayat transkasi
   $riwayat = transaksipembayaran::where('user_id', Auth::user()->id)->count();

   //count laporan bulanan
   $bulan1 = transaksimobil::whereMonth('created_at', date('01'))->count();
   $bulan2 = transaksimobil::whereMonth('created_at', date('02'))->count();
   $bulan3 = transaksimobil::whereMonth('created_at', date('03'))->count();
   $bulan4 = transaksimobil::whereMonth('created_at', date('04'))->count();
   $bulan5 = transaksimobil::whereMonth('created_at', date('05'))->count();
   $bulan6 = transaksimobil::whereMonth('created_at', date('06'))->count();
   $bulan7 = transaksimobil::whereMonth('created_at', date('07'))->count();
   $bulan8 = transaksimobil::whereMonth('created_at', date('08'))->count();
   $bulan9 = transaksimobil::whereMonth('created_at', date('09'))->count();
   $bulan10 = transaksimobil::whereMonth('created_at', date('10'))->count();
   $bulan11 = transaksimobil::whereMonth('created_at', date('11'))->count();
   $bulan12 = transaksimobil::whereMonth('created_at', date('12'))->count();

   $pembayaran = transaksipembayaran::where('user_id', Auth::user()->id)->count();
   $data_pesanan = transaksimobil::all();
   $mobil = mobil::all()->count();
   $user = User::where('role', 3)->count();
   $admin = User::where('role', 2)->count();
   return view('home',compact('pesanan_belum_dibayar','pesanan_sudah_dibayar','data_pesanan','mobil','user','admin','pembayaran','mobil_keluar','mobil_pending','mobil_kembali','riwayat','bulan1',
      'bulan2','bulan3','bulan4','bulan5','bulan6','bulan7','bulan8','bulan9','bulan10','bulan11','bulan12'));
 }
}
