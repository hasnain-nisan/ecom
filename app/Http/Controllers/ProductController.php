<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
  public function products()
  {
    $products = Product::orderby('id','desc')->paginate(1);
    return view('pages.products.index', compact('products'));
  }

  public function show($slug)
  {
    $product = Product::where('slug', $slug)->first();
    if(!is_null($product)) {
      return view('pages.products.show', compact('product'));
    } else {
      session()->flash('error', 'There is no product by this url');
      return redirect()->route('products');
    }
  }

}
