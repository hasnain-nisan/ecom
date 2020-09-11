<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Slider;
use App\ProductImage;

class PageController extends Controller
{
    public function index()
    {
      $sliders = Slider::orderby('priority','asc')->get();
      $products = Product::orderby('id','desc')->paginate(1);
      return view('pages.index', compact('products', 'sliders'));
    }

    public function search(Request $request)
    {
      $search = $request->search;
      $products = Product::orWhere('title', 'like', '%'.$search.'%')
      ->orWhere('description', 'like', '%'.$search.'%')
      ->orWhere('price', 'exact', '%'.$search.'%')
      ->orWhere('slug', 'like', '%'.$search.'%')
      ->orderby('id', 'desc')
      ->paginate(1);
      return view('pages.products.search', compact('search','products'));
    }


}
