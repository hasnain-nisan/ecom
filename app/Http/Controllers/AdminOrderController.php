<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class AdminOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function order_manage()
    {
      //find all order
      $orders = Order::orderby('id', 'desc')->get();
      return view('admin.order.manage', compact('orders'));
    }

    public function order_show($id)
    {
      //find order from id
      $order = Order::find($id);
      $order->is_seen_by_admin = 1;
      $order->save();
      return view('admin.order.show', compact('order'));
    }

    public function order_paid($id)
    {
      $order = Order::find($id);
      if($order->is_paid) {
        $order->is_paid = 0;
      } else {
        $order->is_paid = 1;
      }
      $order->save();
      session()->flash('success', 'The order paid status has been changed');
      return back();
    }

    public function order_completed($id)
    {
      $order = Order::find($id);
      if($order->is_completed) {
        $order->is_completed = 0;
      } else {
        $order->is_completed = 1;
      }
      $order->save();
      session()->flash('success', 'The order completed status has been changed');
      return back();
    }


}
