<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\password_resets;
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use DB;
use Illuminate\Support\Str;
use session;
use Auth;

class ResetPasswordController extends Controller
{
  public function lupa_password()
  {
    return view('auth.lupa-password');
  }

  public function post_reset_password(Request $request)
  {
    $request->validate([
      'email' => 'required|email|exists:users',
      'g-recaptcha-response' => 'required|captcha'
    ]);

    $token = Str::random(64);

    DB::table('password_resets')->insert([
      'email' => $request->email, 
      'token' => $token, 
      'created_at' => Carbon::now()
    ]);

    Mail::send('auth.forgetPassword', ['token' => $token], function($message) use($request){
      $message->to($request->email);
      $message->subject('Reset Password');
    });

    alert()->success('Berhasil','silahkan priksa email anda');
    return back();
  }

  public function reset_password_get($token) { 
   return view('auth.forgetPasswordLink', ['token' => $token]);
 }

 public function reset_password_post(Request $request)
 {
  $request->validate([
     'email' => 'required|email|exists:users',
    'password' => 'required|string|confirmed',
  ]);
  
  $updatePassword = DB::table('password_resets')
  ->where([
    'email' => $request->email, 
    'token' => $request->token
  ])
  ->first();
  
  if(!$updatePassword){
    return back()->withInput()->with('error', 'Invalid token!');
  }
  
  $user = User::where('email', $request->email)
  ->update(['password' => Hash::make($request->password)]);

  DB::table('password_resets')->where(['email'=> $request->email])->delete();
  alert()->success('Password','berhasil di reset');
  return redirect('/');
}

}
