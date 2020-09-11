<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Str;
use Image;
use App\ProductImage;
use File;
use App\Brand;
use App\Category;

class AdminProductController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

    public function product_create()
    {
      return view('admin.product.create');
    }

    public function product_manage()
    {
      $products = Product::orderby('id', 'desc')->get();
      return view('admin.product.manage')->with('products', $products);
    }

    public function product_edit($id)
    {
      $product = Product::find($id);
      return view('admin.product.edit', compact('product'));
    }

    public function product_delete($id)
    {
      $product = Product::find($id);
      $productimage = ProductImage::orderby('id', 'desc')->where('product_id', $product->id)->get();
      if(!is_null($product)) {
        foreach ($productimage as $pimage) {
          if (File::exists('images/products/' .$pimage->image)){
            File::delete('images/products/' .$pimage->image);
            $pimage->delete();
          }
        }
        $product->delete();
      }
      session()->flash('error', 'Product has deleted successfully');
      return redirect()->route('admin.product.manage');
    }

    public function product_store(Request $request)
    {
      $request->validate([
        'title' => 'required|max:20',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'brand_id' => 'required',
        'category_id' =>'required',
      ]);

      $product = new Product;

      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->quantity = $request->quantity;

      $product->category_id = $request->category_id;
      $product->brand_id = $request->brand_id;
      $product->admin_id = 1;

      $product->slug = Str::slug($request->title);
      $product->save();

      //inserting one image and saving
      // if ($request->hasFile('product_image')) {
      //   $image = $request->file('product_image');
      //   $img = time(). '.' .$image->getClientOriginalExtension();
      //   $location = public_path('images/products/' .$img);
      //   Image::make($image)->save($location);
      //
      //   $product_image = new ProductImage;
      //   $product_image->product_id = $product->id;
      //   $product_image->image = $img;
      //   $product_image->save();
      // }

      //inserting multiple image and save image
     if(($request->product_image)>0) {
       foreach($request->product_image as $image) {
           $img = rand(). '.' .$image->getClientOriginalExtension();
           $location = public_path('images/products/' .$img);
           Image::make($image)->save($location);

           $product_image = new ProductImage;
           $product_image->product_id = $product->id;
           $product_image->image = $img;
           $product_image->save();
       }
     }

        session()->flash('success', 'Product has created successfully');
      return redirect()-> route('admin.product.create');
      }

      public function product_update(Request $request, $id)
      {
        $request->validate([
          'title' => 'required|max:20',
          'description' => 'required',
          'price' => 'required|numeric',
          'quantity' => 'required|numeric',
          'brand_id' =>'required',
          'category_id' =>'required'
        ]);

        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;

        $product->save();

        //inserting one image and saving
        // if ($request->hasFile('product_image')) {
        //   $image = $request->file('product_image');
        //   $img = time(). '.' .$image->getClientOriginalExtension();
        //   $location = public_path('images/products/' .$img);
        //   Image::make($image)->save($location);
        //
        //   $product_image = new ProductImage;
        //   $product_image->product_id = $product->id;
        //   $product_image->image = $img;
        //   $product_image->save();
        // }

        //inserting multiple image and save image
        if(($request->product_image)>0) {
          foreach($request->product_image as $image) {
            $productimage = ProductImage::orderby('id', 'desc')->where('product_id', $product->id)->get();
            foreach ($productimage as $pimage) {
              if (File::exists('images/products/' .$pimage->image)){
                File::delete('images/products/' .$pimage->image);
                $pimage->delete();
              }
            }
          }

           foreach($request->product_image as $image) {
              $img = rand(). '.' .$image->getClientOriginalExtension();
              $location = public_path('images/products/' .$img);
              Image::make($image)->save($location);

              $product_image = new ProductImage;
              $product_image->product_id = $product->id;
              $product_image->image = $img;
              $product_image->save();
          }
        }

        session()->flash('success', 'Product has updated successfully');
        return redirect()-> route('admin.product.manage');
        }
}
