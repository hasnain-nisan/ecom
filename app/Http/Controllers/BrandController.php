<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Image;
use File;

class BrandController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function create()
  {
    return view('admin.brand.create');
  }

  public function manage()
  {
    $brands = Brand::orderby('id', 'desc')->get();
    return view('admin.brand.manage', compact('brands'));
  }

  public function edit($id)
  {
    $brand = Brand::find($id);
    return view('admin.brand.edit', compact('brand'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:20',
      'description' => 'required',
      'image' => 'nullable|image',
    ]);

    $brand = new Brand();
    $brand->name = $request->name;
    $brand->description = $request->description;
      //inserting category img
     if($request->hasFile('image')) {
       $image = $request->file('image');
       $img = rand(). '.' .$image->getClientOriginalExtension();
       $location = public_path('images/brands/' .$img);
       Image::make($image)->save($location);
       $brand->image = $img;
      }
    $brand->save();

   session()->flash('success', 'A new brand has created successfully');
   return redirect()->route('admin.brand.create');
  }


public function delete($id)
  {
    $brand = Brand::find($id);
    if(!is_null($brand)) {
          if (File::exists('images/brands/' .$brand->image)){
            File::delete('images/brands/' .$brand->image);
          }
          $brand->delete();
       }
    session()->flash('error', 'Selected brand has been deleted successfully');
    return redirect()->route('admin.brand.manage');
  }



    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:20',
        'description' => 'required',
        'image' => 'nullable|image',
      ]);

      $brand = Brand::find($id);

      $brand->name = $request->name;
      $brand->description = $request->description;

      //inserting one image and saving
      if (!is_null($request->image)) {
       //deleteing old images
       if (File::exists('images/brands/' .$brand->image)){
         File::delete('images/brands/' .$brand->image);
       }

        $image = $request->file('image');
        $img = rand(). '.' .$image->getClientOriginalExtension();
        $location = public_path('images/brands/' .$img);
        Image::make($image)->save($location);
        $brand->image = $img;
      }

      $brand->save();
      session()->flash('success', 'Brand has updated successfully');
      return redirect()-> route('admin.brand.manage');
    }
}
