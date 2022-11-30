<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\merek;
use Ramsey\Uuid\Uuid;

class MerekController extends Controller
{
    public function get_merek()
    {
        $data = merek::orderBy('id','desc')->get();
        return view('master-data.master-merek',compact('data'));
    }

    public function post_merek(Request $request)
    {
        //dd($request->all());
        $request->validate([
         'merek'=>'required'
     ]);

        foreach($request->merek as $key => $value)
        {
            $post = new merek;
            $post->uuid = Uuid::uuid4()->getHex();
            $post->merek = $value;
            toast('Data berhasil di tambahkan','success');
            $post->save();
        }
        
        return redirect('/master/merek');
    }


    public function update_merek(Request $request, $id)
    {
        $request->validate([
         'merek'=>'required'
     ]);

        $ubah = merek::find($id);
        $ubah->merek = $request->merek;

        toast('Data berhasil di ubah','success');
        $ubah->update();
        return redirect('/master/merek');
    }


    public function delete_merek($id)
    {
        $hapus = merek::find($id);
        toast('Data berhasil di hapus','success');
        $hapus->delete();
        return redirect('/master/merek');
    }
    
}
