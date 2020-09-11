<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Image;
use File;

class AdminCategoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function create()
  {
    $main = Category::orderby('id', 'desc')->where('parent_id', NULL)->get();
    return view('admin.category.create', compact('main'));
  }

  public function manage()
  {
    $categories = Category::orderby('id', 'desc')->get();
    return view('admin.category.manage', compact('categories'));
  }

  public function edit($id)
  {
    $main = Category::orderby('id', 'desc')->where('parent_id', NULL)->get();
    $category = Category::find($id);
    return view('admin.category.edit', compact('category', 'main'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:20',
      'description' => 'required',
      'image' => 'nullable|image',
    ]);

    $category = new Category();
    $category->name = $request->name;
    $category->description = $request->description;
    $category->parent_id = $request->parent_id;


    //inserting category img
    if($request->hasFile('image')) {
      $image = $request->file('image');
      $img = rand(). '.' .$image->getClientOriginalExtension();
      $location = public_path('images/categories/' .$img);
      Image::make($image)->save($location);
      $category->image = $img;
    }
     $category->save();

   session()->flash('success', 'Category has created successfully');
   return redirect()->route('admin.category.create');
  }


 public function delete($id)
  {
    $category = Category::find($id);
    if(!is_null($category)) {
      //if it is a parent category then delete its sub Category
      if($category->parent_id == NULL) {
        //delete its sub Category
        $sub = Category::orderby('id', 'desc')->where('parent_id', $category->id)->get();
        foreach ($sub as $cat) {
          //delete sub category images
          if (File::exists('images/categories/' .$cat->image)){
            File::delete('images/categories/' .$cat->image);
          }
          $cat->delete();
        }
      }
      //delete parant category images
      if (File::exists('images/categories/' .$category->image)){
        File::delete('images/categories/' .$category->image);
      }
      $category->delete();
    }
    session()->flash('error', 'category has deleted successfully');
    return redirect()->route('admin.category.manage');
  }



    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:20',
        'description' => 'required',
        'image' => 'nullable|image',
      ]);

      $category = Category::find($id);

      $category->name = $request->name;
      $category->description = $request->description;
      $category->parent_id = $request->parent_id;

      //inserting one image and saving
      if (!is_null($request->image)) {
       //deleteing old images
       if (File::exists('images/categories/' .$category->image)){
         File::delete('images/categories/' .$category->image);
       }

        $image = $request->file('image');
        $img = rand(). '.' .$image->getClientOriginalExtension();
        $location = public_path('images/categories/' .$img);
        Image::make($image)->save($location);
        $category->image = $img;
      }

      $category->save();
      session()->flash('success', 'Category has updated successfully');
      return redirect()-> route('admin.category.manage');
    }
}
