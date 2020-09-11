<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\Notifications\VerifyRegistration;
use App\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
      ]);

      //find user by email
      $user = User::where('email', $request->email)->first();

        if(!is_null($user)) {
          if($user->status == 1) {
            if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
              return redirect()->intended(route('index'));
            }
          } else {
            $user->notify(new VerifyRegistration($user));
            session()->flash('success', 'A new confirmation email has sent to you, please check it');
            return redirect()->route('login');
          }
          } else {
          session()->flash('error', 'There is no user with that email, please register first');
          return redirect()->route('register');
        }



    }

    public function logout()
    {
      Auth::logout();
      return redirect()->route('index');
    }


}
