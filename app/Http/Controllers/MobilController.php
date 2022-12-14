<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenis;
use App\Models\merek;
use App\Models\mobil;
use Ramsey\Uuid\Uuid;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use App\Models\transaksimobil;
use Auth;
use App\Models\komentar;
use App\Models\like;

class MobilController extends Controller
{
    public function get_mobil()
    {
        $jenis = jenis::all();
        $merek = merek::all();
        $data = mobil::orderBy('id','desc')->get();

        return view('master-data.master-mobil',compact('jenis','merek','data'));
    }

    public function post_mobil(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'no_polisi'=>'required|unique:mobil',
            'nama_mobil'=>'required',
            'merek_id'=>'required',
            'jenis_id'=>'required',
            'kapasitas_penumpang'=>'required',
            'transmisi'=>'required',
            'bahan_bakar'=>'required',
            'status'=>'required',
            'kondisi'=>'required',
            'harga'=>'required',
        ]);
        $post = new mobil;
        $post->uuid = Uuid::uuid4()->getHex();
        $post->no_polisi = $request->no_polisi;
        $post->nama_mobil = $request->nama_mobil;
        $post->merek_id = $request->merek_id;
        $post->jenis_id = $request->jenis_id;
        $post->kapasitas_penumpang = $request->kapasitas_penumpang;
        $post->transmisi = $request->transmisi;
        $post->bahan_bakar = $request->bahan_bakar;
        $post->status = $request->status;
        $post->kondisi = $request->kondisi;
        $post->harga = $request->harga;

        if ($request->hasfile('image')) 
        {
            $destination = '/image/'.$post->image;

            if (File::exists($destination)) 
            {
               File::delete($destination);
           }

           $file = $request->file('image');
           $extention = $file->getClientOriginalExtension();
           $filename = time().'.'.$extention;
           $file->move('image_mobil', $filename);
           $post->image = $filename;
       }
       toast('Data berhasil ditambahkan','success');
       $post->save();
       return back();
   }


   public function edit_mobil($id)
   {
       $edit = mobil::find($id);
       $jenis = jenis::all();
       $merek = merek::all();
       return view('master-data.master-edit.edit-mobil',compact('edit','jenis','merek'));
   }

   public function update_mobil(Request $request, $id)
   {
     //dd($request->all());
    $request->validate([
        'no_polisi'=>'required',
        'nama_mobil'=>'required',
        'merek_id'=>'required',
        'jenis_id'=>'required',
        'kapasitas_penumpang'=>'required',
        'transmisi'=>'required',
        'bahan_bakar'=>'required',
        'status'=>'required',
        'kondisi'=>'required',
        'harga'=>'required',
    ]);
    $ubah = mobil::find($id);
    $ubah->uuid = Uuid::uuid4()->getHex();
    $ubah->no_polisi = $request->no_polisi;
    $ubah->nama_mobil = $request->nama_mobil;
    $ubah->merek_id = $request->merek_id;
    $ubah->jenis_id = $request->jenis_id;
    $ubah->kapasitas_penumpang = $request->kapasitas_penumpang;
    $ubah->transmisi = $request->transmisi;
    $ubah->bahan_bakar = $request->bahan_bakar;
    $ubah->status = $request->status;
    $ubah->kondisi = $request->kondisi;
    $ubah->harga = $request->harga;

    if ($request->hasfile('image')) 
    {
        $destination = '/image/'.$ubah->image;

        if (File::exists($destination)) 
        {
           File::delete($destination);
       }

       $file = $request->file('image');
       $extention = $file->getClientOriginalExtension();
       $filename = time().'.'.$extention;
       $file->move('image_mobil', $filename);
       $ubah->image = $filename;
   }
   toast('Data berhasil diubah','success');
   $ubah->update();
   return redirect('/master/mobil');
}

public function detail_mobil($id)
{
    $detail = mobil::find($id);
    return view('master-data.master-detail.detail-mobil',compact('detail'));
}

public function hapus_mobil($id)
{
    $hapus =  mobil::find($id);
    $file = public_path('/image_mobil/').$hapus->image;
    if (file_exists($file)) 
    {
       @unlink($file);
   }
   toast('Data berhasil hapus','success');
   $hapus->delete();
   return back();
}

public function get_daftar_mobil()
{

    $data = mobil::paginate(6);
    //$like = like::where('mobil_id');
    $pesanan = transaksimobil::where('user_id', Auth::user()->id)->count();
    $data_pesanan = transaksimobil::all();
    //$jumlah=komentar::where('mobil_id')->count();

    
    return view('transaksi-data.daftar-mobil',compact('data','pesanan','data_pesanan'));
}

function order_mobil($id)
{   $min_umur = 18;
    $user = User::where('id', Auth::user()->id)->first();
    $order = mobil::find($id);
    $pesanan = transaksimobil::where('user_id', Auth::user()->id)->count();
    $data_pesanan = transaksimobil::all();
    $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=32');
    $data = $response->json();
    $data = $data['kota_kabupaten'];
    if ($user->no_tlp==null) {
        toast('mohon maaf no telepon masih kosong ','warning');
       return back();
   }elseif ($user->no_ktp==null) {
       toast('mohon maaf no ktp masih kosong','warning');
       return back();
   }elseif ($user->foto_ktp==null) {
       toast('mohon maaf foto ktp belum di upload','warning');
       return back();
   }elseif ($user->foto_sim==null) {
       toast('mohon maaf foto sim belum di upload','warning');
       return back();
    }elseif ($user->umur==null) {
       toast('mohon maaf umur masih kosong','warning');
       return back();
    }elseif ($user->umur < $min_umur) {
       toast('mohon maaf umur ada belum mencukupi','warning');
       return back();
    }     
   elseif($order->status==1) {
       return view('transaksi-data.order-mobil',compact('order','data','pesanan','data_pesanan'));
   }elseif($order->status==2){
    toast('Mohon maaf mobil sedang disewa','warning');
    return back();
}else{
    return view('transaksi-data.order-mobil',compact('order','data','pesanan','data_pesanan')); 
}



}

}
