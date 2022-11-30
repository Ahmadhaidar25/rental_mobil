<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function post_register(Request $request)
    {

        if ($request->nama==null) {
         alert()->error('Nama tidak boleh kosong');
         return redirect()->back();
     }elseif ($request->email==null) {
        alert()->error('Email tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->no_tlp==null) {
        alert()->error('No telepon tidak boleh kosong');
        return redirect()->back();
    }elseif ($request->password==null) {
     alert()->error('Password telepon tidak boleh kosong');
     return redirect()->back();
 }else{
    $request->validate([
        'email' => 'required|min:dns',
        'password' => 'required|min:6|max:8',
        'g-recaptcha-response' => 'required|captcha'
    ],[
      'password.required' => 'password min 6',
      'g-recaptcha-response.required' => 'Captcha harus di centang',
  ]);

    $post = new User;
    $post->uuid = Uuid::uuid4()->getHex();
    $post->nama = $request->nama;
    $post->email = $request->email;
    $post->password = Hash::make($request->password);
    $post->no_tlp = $request->no_tlp;
    $post->role = $request->role;
    $post->status = $request->status;
    toast('Akun berhasil terdaftar silahkan login','success');
    $post->save();
}

return redirect('/');

}
}
