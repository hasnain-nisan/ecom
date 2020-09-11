<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;


class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.mycart');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'product_id' => 'required'
        ]);

        if(Auth::check()) {
          $cart = Cart::where('user_id', Auth::id())->where('product_id', $request->product_id)->where('order_id', NULL)->first();
        } else {
          $cart = Cart::where('ip_address', request()->ip())->where('product_id', $request->product_id)->where('order_id', NULL)->first();
        }
        if(!is_null($cart)) {
            $cart -> increment('product_quantity');
          }  else {
            $cart = new Cart();
            if(Auth::check()) {
              $cart->user_id = Auth::user()->id;
            } else {
              $cart->ip_address = request()->ip();
            }
            $cart->product_id = $request->product_id;
            $cart->save();
          }
        session()->flash('success', 'Product has added to the cart');
        return back();
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        if(!is_null($cart)) {
          $cart->product_quantity = $request->product_quantity;
        }

        $cart->save();
        session()->flash('success', 'The item has been updated');
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $cart = Cart::find($id);
        if(!is_null($cart)) {
          $cart->delete();
        }

        session()->flash('error', 'The Item has been deleted');
        return redirect()->route('carts');
    }
}
