<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\komentar;
use Ramsey\Uuid\Uuid;
use App\Models\mobil;
use Auth;

class KomentarController extends Controller
{

  public function komentar($id)
  {
      $komentar = mobil::find($id);
      return view('transaksi-data.komentar',compact('komentar'));
  }

  public function kirim_komentar(Request $request)
  {
     $request->validate([
       'komentar'=>'required'
   ]);

     $kirim = new komentar;
     $kirim->uuid = Uuid::uuid4()->getHex();
     $kirim->user_id = Auth::user()->id;
     $kirim->mobil_id = $request->mobil_id;
     $kirim->komentar = $request->komentar;
     $kirim->parent = $request->parent;
     $kirim->save();
     return back();
 }

 public function balas_komentar_caild1(Request $request)
 {
    $request->validate([
       'komentar'=>'required'
   ]);

    $kirim = new komentar;
    $kirim->uuid = Uuid::uuid4()->getHex();
    $kirim->user_id = Auth::user()->id;
    $kirim->mobil_id = $request->mobil_id;
    $kirim->komentar = $request->komentar;
    $kirim->parent = $request->parent;
    $kirim->save();
    return back();
}

public function balas_komentar_caild2(Request $request)
{
    $request->validate([
       'komentar'=>'required'
   ]);

    $kirim = new komentar;
    $kirim->uuid = Uuid::uuid4()->getHex();
    $kirim->user_id = Auth::user()->id;
    $kirim->mobil_id = $request->mobil_id;
    $kirim->komentar = $request->komentar;
    $kirim->parent = $request->parent;
    $kirim->save();
    return back();
}

public function hapus_komentar($id)
{
    $hapus = komentar::find($id);
    $hapus->delete();
    toast('Komentar berhasil dihapus','success');
    return back();
}
}
