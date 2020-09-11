<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Order;
use App\Cart;
use Auth;

class CheckoutController extends Controller
{
    public function index()
    {
      $payments = Payment::orderby('id', 'asc')->get();
      return view('pages.checkout', compact('payments'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'reciever_name' => 'required',
        'reciever_phone' => 'required',
        'shipping_add' => 'required',
        'payment_method' => 'required'
      ]);

      $order = new Order();

      if($request->payment_method != 'cash_on_delivery') {
        if($request->transaction_id == NULL || empty($request->transaction_id)) {
          session()->flash('error', 'Please provide the transaction ID of your payment');
          return back();
        }
      }

      $order->name = $request->reciever_name;
      $order->email = $request->reciever_email;
      $order->phone_numb = $request->reciever_phone;
      $order->shipping_address = $request->shipping_add;
      $order->payment_id = Payment::where('short_name', $request->payment_method)->first()->id;
      $order->transaction_id = $request->transaction_id;
      $order->message = $request->aditional_msg;
      if(Auth::check()) {
        $order->user_id = Auth::user()->id;
      } else {
        $order->ip_address = $request->ip();
      }

      $order->save();

      foreach (Cart::totalCarts() as $cart) {
        $cart->order_id = $order->id;
        $cart->save();
      }

      session()->flash('success', 'Your order is submitted successfully, please wait for the confirmation');
      return redirect()->route('index');



    }
}
