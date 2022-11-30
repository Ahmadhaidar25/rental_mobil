<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin()
    {
        $data = User::all('id','nama','email','avatar','role','status')->where('role',2);
        return view('master-data.master-admin',compact('data'));
    }

    public function post_admin(Request $request)
    {

        //dd($request->all());

      $request->validate([
         'nama'=>'required',
         'email'=>'required',
         'password'=>'required',
         'role'=>'required',
         'status'=>'required',
     ]);

      $post = new User;
      $post->uuid = Uuid::uuid4()->getHex();
      $post->nama = $request->nama;
      $post->email = $request->email;
      $post->password = Hash::make($request->password);
      $post->role = $request->role;
      $post->status = $request->status;
      $post->save();
      toast('Admin berhasil di tambahkan','success');
      return back();

  }

  public function ubah_status(Request $request, $id)
  {
   $request->validate([
     'status'=>'required'
 ]);

   $post = User::find($id);
   $post->status = $request->status;
   $post->update();
   toast('Status berhasil di ubah','success');
   return back();

}
}
