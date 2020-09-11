<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Admin;
use Illuminate\Http\Request;
use DB;


class AdminForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function __construct()
    {
      $this->middleware('guest:admin');
    }

    public function showLinkRequestForm()
    {
      return view('admin.auth.passwords.email');
    }

    public function sendResetLinkEmail()
    {
      dd('test');
    }

    private function resetEmail($email, $token) {
      $admin = DB::table('admins')->where('email', $email)->first();

      //generate the password reset link
      $link = config('base_url') . 'password/reset' . $token . '?email=' . urlencode($admin->email);
    }

    public function broker()
    {
      return password::broker('admins');
    }
}
