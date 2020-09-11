<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;


class AdminLoginController extends Controller
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
     protected $redirectTo = '/admin/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
      return view('admin.auth.login');
    }

    public function login(Request $request)
    {
      //validate the form Data
      $this->validate($request, [
        'email' => 'required|email',
        'password' =>'required|min:6'
      ]);

      //attempt to log the user in
      if(Auth::guard('admin')->attempt(['email' =>$request->email, 'password' =>$request->password], $request->remember)) {
        //if successful, then redirect to their intended location
        return redirect()->intended(route('admin.index'));
      } else {
        //if unsuccessful then show the login form
        session()->flash('error', 'Invalid login informations');
        return back();
      }
    }

    public function logout()
    {
      Auth::guard('admin')->logout();
      return redirect()->route('admin.login');
    }


}
