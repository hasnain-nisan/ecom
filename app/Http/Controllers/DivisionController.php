<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ Division;
use App\District;

class DivisionController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function create()
  {
    $divisions = Division::orderby('priority', 'asc')->get();
    return view('admin.division.create', compact('divisions'));
  }

  public function edit($id)
  {
    $division = Division::find($id);
    return view('admin.division.edit', compact('division'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:20',
      'priority' => 'required',
    ]);

    $division = new Division();
    $division->name = $request->name;
    $division->priority = $request->priority;
    $division->save();

   session()->flash('success', 'A new division has created successfully');
   $divisions = Division::orderby('priority', 'asc')->get();
   return view('admin.division.create', compact('divisions'));
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required|max:20',
      'priority' => 'required',
    ]);

    $division = Division::find($id);
    $division->name = $request->name;
    $division->priority = $request->priority;
    $division->save();

   session()->flash('success', 'The division is updated successfully');
   $divisions = Division::orderby('priority', 'asc')->get();
   return view('admin.division.create', compact('divisions'));
  }

  public function delete($id)
    {
      $division = Division::find($id);
      $districts = District::orderby('priority', 'asc')->where('division_id', $division->id)->get();
      if(!is_null($division)) {
        foreach ($districts as $district) {
          $district->delete();
        }
            $division->delete();
         }

      $divisions = Division::orderby('priority', 'asc')->get();
      session()->flash('error', 'Selected division has deleted successfully');
      return redirect()->route('admin.division.create');
    }

}
