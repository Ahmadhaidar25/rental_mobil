<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Intervention\Image\Exception\NotReadableException;
Use Image;
use App\Models\User;
use App\Models\pengguna;
use Illuminate\Support\Facades\Http;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
class AkunController extends Controller
{
  public function akun()
  {
    $get = User::where('id', Auth::user()->id)->first();
    $response=Http::get('https://alamat.thecloudalert.com/api/kabkota/get/?d_provinsi_id=9');
    $data = $response->json();
    $data = $data['result'];

    return view('akun.akun',compact('data','get'));
  }

  public function ubah_foto(Request $request)
  {

   $validatedData = $request->validate([
     'avatar' => 'required|image|mimes:jpg,png,jpeg|max:2048',
   ]);
   if ($request->hasfile('avatar')) {
     $avatar = $request->file('avatar');
     $filename = time() .','. $avatar->getClientOriginalExtension();
     Image::make($avatar)->resize(300, 300)->save( public_path('/image_avatar/' . $filename));

     $user = Auth::user();
     $user->avatar = $filename;

     $user->update();
     toast('Avatar success update','success');
     return back();
   }
 }

 public function update_profil(Request $request)
 {
   
   $id_user = Auth::user()->id;
   $user = User::find($id_user);
   
   $user->nama = isset($request->nama)? $request->nama : null;
   $user->no_tlp = isset($request->no_tlp)? $request->no_tlp : null;
   $user->no_ktp = isset($request->no_ktp)? $request->no_ktp : null;
   $user->tempat_lahir = isset($request->tempat_lahir)? $request->tempat_lahir : null;
   $user->tgl_lahir = isset($request->tgl_lahir)? $request->tgl_lahir : null;
   $user->umur = isset($request->umur)? $request->umur : null;
   $user->gander = isset($request->gander)? $request->gander : null;
   $user->alamat = isset($request->alamat)? $request->alamat : null;
   $user->pekerjaan = isset($request->pekerjaan)? $request->pekerjaan : null;

   if ($request->hasfile('foto_sim')) 
   {
    $destination = '/foto_sim/'.$user->foto_sim;

    if (File::exists($destination)) 
    {
     File::delete($destination);
   }

   $file = $request->file('foto_sim');
   $extention = $file->getClientOriginalExtension();
   $filename = time().'.'.$extention;
   $file->move('image_sim', $filename);
   $user->foto_sim = $filename;
 }

 elseif ($request->hasfile('foto_ktp')) 
 {
  $destination = '/foto_ktp/'.$user->foto_ktp;

  if (File::exists($destination)) 
  {
   File::delete($destination);
 }

 $file = $request->file('foto_ktp');
 $extention = $file->getClientOriginalExtension();
 $filename = time().'.'.$extention;
 $file->move('image_ktp', $filename);
 $user->foto_ktp = $filename;
}
toast('Profil berhasil di ubah','success');
$user->save();
return back();
}

public function ubah_password(Request $request)
{

 $request->validate([
  'current_password' => ['required'],
  'password' => ['required', 'confirmed'],

]);

 if (Hash::check($request->current_password, auth()->user()->password)) {
  auth()->user()->update(['password' => Hash::make($request->password)]);
  toast('Password berhasil diubah','success');
  return back();
}else{
 toast('Password lama tidak sesuai','warning');
 return back();
}

}
}
