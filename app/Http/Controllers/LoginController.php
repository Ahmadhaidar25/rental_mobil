<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use guard;

class LoginController extends Controller
{


    public function auth()
    {
        return view('auth.login');
    }

    public function post_auth(Request $request)
    {

      if ($request->email==null) {
       alert()->error('Email tidak boleh kosong');
       return redirect()->back();
   }elseif ($request->password==null) {
     alert()->error('Password tidak boleh kosong');
     return redirect()->back();
 }else{

     if ($request->isMethod('post')) {
        $data= $request->all();
        $roles=[
            'email' => 'required|email|max:255',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ];
        $customessage=[
            'email.required' =>'Email is required',
            'password.required' => 'Password is required',
            'g-recaptcha-response.required' => 'Captcha harus di centang',
        ];
        $this->validate($request,$roles,$customessage);
        
        if(Auth::guard('web')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])) {
            toast('berhasil','success');
            return redirect('home');
        } else {
            toast('akun telah dinonaktifkan silahkan hubungi super admin','warning');
            return redirect()->back();
        }
        
    }
}
toast('erros','error');
return view('/');


}

public function logout()
{
    Auth::logout();
    toast('berhasil','success');
    return redirect('/');
}


}
