<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksimobil;
use App\Models\mobil;
use Ramsey\Uuid\Uuid;
use App\Models\transaksipembayaran;
use Auth;

class BayarController extends Controller
{
  // public $snapToken;
  // public $rental;
   public $va_number,$gross_amount,$bank,$transaction_status,$deadline;

   public function payment(Request $request, $id)
   {
   // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = 'SB-Mid-server-0hsOwGPjem1wZKo0nFTrrQMe';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;
    $data = transaksimobil::find($id);
    $params = array(
        'transaction_details' => array(
            'order_id' => $data->id,
            'gross_amount' => $data->total,
        ),
        'customer_details' => array(
            'last_name' => $data->user->nama,
        ),
    );

    $snapToken = \Midtrans\Snap::getSnapToken($params);

    return view('bayar.payment',compact('snapToken','data'));

}

public function render()
{

}
public function payment_post(Request $request, $id)
{
    //return $request;
    $json = json_decode($request->get('json'));
    $post = new transaksipembayaran();
    $post->uuid = Uuid::uuid4()->getHex();
    $post->user_id = Auth::user()->id;
    $post->transaksi_mobil_id = $json->order_id;
    $post->gross_amount = $json->gross_amount;
    $post->payment_type = $json->payment_type;
    $post->transaction_time = $json->transaction_time;
    $post->transaction_status = $json->transaction_status;
    $post->bank = isset($json->bank) ? $json->bank : null;
    $post->va_number = isset($json->va_number) ? $json->va_number : null;
    $post->save();

    $ubah = transaksimobil::find($id);
    $ubah->status_transaksi = $request->status_transaksi;
    $ubah->update();
    return redirect('/pesanan/saya');

}



}
