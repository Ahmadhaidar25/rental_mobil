<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksimobil;
use App\Models\transaksipembayaran;
use App\Models\mobil;
use Auth;
use Ramsey\Uuid\Uuid;

class TransaksiMobilController extends Controller
{
  public function sewa_sekarang(Request $request,$id)
  {
   $request->validate([
    'mobil_id'=>'required',
    'lama_sewa'=>'required',
    'total'=>'required',
    'dari_tanggal'=>'required',
    'sampai_tanggal'=>'required',
    'dari_kota'=>'required',
    'ke_kota'=>'required',
  ],[

   'lama_sewa.required'=>'lama sewa harus di isi',
   'total.required'=>'total harus di isi',
   'dari_tanggal.required'=>'dari tanggal harus di isi',
   'sampai_tanggal.required'=>'sampai tanggal harus di isi',
   'dari_kota.required'=>'dari kota harus di isi',
   'ke_kota.required'=>'ke kota harus di isi',
 ]);

   $post= new transaksimobil;
   $post->uuid = Uuid::uuid4()->getHex();
   $post->user_id = Auth::user()->id;
   $post->mobil_id = $request->mobil_id;
   $post->lama_sewa = $request->lama_sewa;
   $post->total = $request->total;
   $post->dari_tanggal = $request->dari_tanggal;
   $post->sampai_tanggal = $request->sampai_tanggal;
   $post->dari_kota = $request->dari_kota;
   $post->ke_kota = $request->ke_kota;
   $post->status_transaksi = $request->status_transaksi;
   toast('silahkan lanjut kepembayaran','success');
   $post->save();

   $ubah = mobil::find($id);
   $ubah->status = $request->status;
   $ubah->update();
   return redirect('/daftar/mobil');
 }

 public function pesanan()
 {
  $data = transaksimobil::orderBy('id','desc')->paginate(5);
  return view('transaksi-data.transaksi-mobil',compact('data'));
}

public function batal_pembayaran($id)
{
  $hapus =  transaksimobil::find($id);
  $file = public_path('/image_mobil/').$hapus->image;
  if (file_exists($file)) 
  {
   @unlink($file);
 }
 toast('Data berhasil hapus','success');
 $hapus->delete();
 return back();
}

public function mobil_keluar()
{
 $data = transaksipembayaran::all();
 return view('transaksi-data.mobil-keluar',compact('data'));
}

public function mobil_pendding()
{
 $data = transaksimobil::all();
 return view('transaksi-data.mobil-pendding',compact('data'));
}

public function mobil_kembali()
{
  $data = transaksipembayaran::orderBy('id','desc')->get();
 return view('transaksi-data.mobil-kembali',compact('data'));
}

}
