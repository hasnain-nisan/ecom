<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Division;
use App\District;
use Auth;
use File;
use Image;


class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function dashboard()
  {
      $user = Auth::user();
      return view('pages.userProfile.userDashboard', compact('user'));
  }

  public function viewProfile($id)
  {
      $user = User::find($id);
      return view('pages.userProfile.viewProfile', compact('user'));
  }

 public function getDistricts($id)
 {
     $districts = District::where('division_id', $id)->get();
     return json_encode($district);
 }

  public function edit($id)
  {
      $divisions = Division::orderby('priority', 'asc')->get();
      $user = User::find($id);
      return view('pages.userProfile.updateProfile', compact('user', 'divisions'));
  }

    public function update(Request $request, $id)
    {
      $user = User::find($id);
      $request->validate([
        'first_name' => ['string', 'max:20'],
        'last_name' => ['string', 'max:20'],

        'phone_numb' => ['string', 'max:255'],

        'photo' => ['image'],

      ]);

      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->username = $request->username;
      $user->gender = $request->gender;
      $user->phone_numb = $request->phone_numb;
      $user->email = $request->email;

      if (!is_null($request->photo)) {
       //deleteing old images
       if (File::exists('images/users/' .$user->photo)){
         File::delete('images/users/' .$user->photo);
       }

        $photo = $request->file('photo');
        $img = rand(). '.' .$photo->getClientOriginalExtension();
        $location = public_path('images/users/' .$img);
        Image::make($photo)->save($location);
        $user->photo = $img;
      }

      $user->email = $request->email;

      if($request->password != NULL || $request->password != '') {
        $user->password = Hash::make($request->password);
      }

      $user->street_add = $request->street_add;
      $user->division_id = $request->division_id;
      $user->district_id = $request->district_id;
      $user->shipping_add = $request->shipping_add;
      $user->ip_add = $request->ip();

      $user->save();

      session()->flash('success', 'User informations has been updated successfully');
      return redirect()-> route('profile.view', $user->id);


  }
}
