<?php

namespace App\Http\Controllers;
use App\Models\transaksipembayaran;
use Illuminate\Http\Request;
use App\Models\transaksimobil;
use App\Models\mobil;

class TransaksiRiwayatController extends Controller
{
    public function transaksi()
    {
        $data = transaksipembayaran::orderBy('id','desc')->paginate(5);
        return view('transaksi-data.transaksi-riwayat',compact('data'));
    }

    public function konfirmasi(Request $request, $id)
    {

        $konfirmasi = mobil::find($id);
        $konfirmasi->kondisi = $request->kondisi;
        $konfirmasi->status = $request->status;
        $konfirmasi->update();
        toast('mobil berhasil di kembalikan','success');
        return back();
    }
}
