<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Image;
use File;

class CategoryController extends Controller
{
  public function index()
  {
    // code...
  }

  public function show($id)
  {
    $categories = Category::find($id);
    if(!is_null($categories)) {
      return view('pages.categories.show', compact('categories'));
    } else {
      session()->flash('error', 'Sorry, There is no category');
      return redirect('/');
    }
  }
}
