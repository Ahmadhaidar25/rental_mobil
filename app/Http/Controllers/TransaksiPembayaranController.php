<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksipembayaran;
use PDF;
use Auth;

class TransaksiPembayaranController extends Controller
{
    public function transaksi_pembayaran()
    {
        $data = transaksipembayaran::all();
        return view('transaksi-data.transaksi-pembayaran',compact('data'));
    }

    public function cetak_pdf($id)
    {
        $cetak = transaksipembayaran::find($id);

        $pdf = PDF::loadview('transaksi-data.cetak-pdf',['cetak'=>$cetak]);
        return $pdf->stream();
    }
}
