<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\User;

class userVerificationController extends Controller
{
 public function verify($token)
 {
   $user = User::where('remember_token', $token)->first();

   if(!is_null($user)) {
     $user->status = 1;
     $user->remember_token = NULL;
     $user->email_verified_at = date('Y-m-d H:i:s');
     $user->save();

     session()->flash('success', 'Your email has been confirmed, login now');
     return redirect('login');
   } else {
     session()->flash('error', 'Your token is missmatched');
     return redirect('/');
   }

 }




}
