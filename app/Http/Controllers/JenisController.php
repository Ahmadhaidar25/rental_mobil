<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenis;
use Ramsey\Uuid\Uuid;

class JenisController extends Controller
{
    public function get_jenis()
    {
        $data = jenis::all('id','jenis_mobil','created_at','updated_at');
        return view('master-data.master-jenis',compact('data'));
    }

    public function post_jenis(Request $request)
    {
        $request->validate([
         'jenis_mobil[]'=>'required'
     ]);

        foreach ($request->jenis_mobil as $key => $value) {
            $post = new jenis;
            $post->uuid = Uuid::uuid4()->getHex();;
            $post->jenis_mobil = $value;
            toast('Data berhasil di tambahkan','success');
            $post->save();
        }
        return redirect('/master/jenis');
    }


    public function update_jenis(Request $request, $id)
    {
        $request->validate([
         'jenis_mobil'=>'required'
     ]);

        $ubah = jenis::find($id);
        $ubah->jenis_mobil = $request->jenis_mobil;

        toast('Data berhasil di ubah','success');
        $ubah->update();
        return redirect('/master/jenis');
    }


    public function delete_jenis($id)
    {
       $hapus = jenis::find($id);
       toast('Data berhasil di hapus','success');
       $hapus->delete();
       return redirect('/master/jenis');
   }
}
