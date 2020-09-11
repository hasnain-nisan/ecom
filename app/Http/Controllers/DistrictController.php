<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;

class DistrictController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function create()
  {
    $districts = District::orderby('priority', 'asc')->get();
    return view('admin.district.create', compact('districts'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:20',
      'priority' => 'required',
    ]);

    $district = new District();
    $district->name = $request->name;
    $district->division_id = $request->division_id;
    $district->priority = $request->priority;
    $district->save();

   session()->flash('success', 'A new district has been created successfully');
   $districts = District::orderby('priority', 'asc')->get();
   return view('admin.district.create', compact('districts'));

  }

  public function edit($id)
  {
    $district = District::find($id);
    return view('admin.district.edit', compact('district'));
  }
public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required|max:20',
      'priority' => 'required',
    ]);

    $district = District::find($id);
    $district->name = $request->name;
    $district->priority = $request->priority;
    $district->save();

   session()->flash('success', 'The district is updated successfully');
   $districts = District::orderby('priority', 'asc')->get();
   return view('admin.district.create', compact('districts'));
  }

  public function delete($id)
    {
      $district = District::find($id);
      if(!is_null($district)) {
            $district->delete();
         }

      $districts = District::orderby('priority', 'asc')->get();
      session()->flash('error', 'Selected district has deleted successfully');
      return redirect()->route('admin.district.create');
    }

}
