@extends('layouts.master')

@section('content')

<div class="container margin-top-20">
  <div class="row">

     @if(App\Cart::totalItems()>0)

     <h4>My Cart Items</h4>

     <table class="table table-bordered table-stripe mt-2">
       <tr>
         <th>serial</th>
         <th>product title</th>
         <th>product image</th>
         <th>product quantity</th>
         <th>Unit Price</th>
         <th>Total Price</th>
         <th>delete</th>
       </tr>
     @php
      $total_price = 0;
     @endphp
     @foreach(App\Cart::totalCarts() as $cart)

     <tr>
       <td>{{$loop->index + 1}}</td>
       <td>
        <a href="{{route('product.show', $cart->product->slug)}}">{{$cart->product->title}}</a>
       </td>
       <td>
         @if(count($cart->product->images)> 0)
          <img src="{{asset('images/products/' .$cart->product->images->first()->image)}}" width="100px">
         @endif
       </td>
       <td>
         <form class="form-inline" action="{{route('carts.update', $cart->id)}}" method="post">
           @csrf
           <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}">
           <button type="submit" class="btn btn-success">Update</button>
         </form>
       </td>
       <td>{{$cart->product->price}} Taka</td>
       <td>
         @php
          $total_price =+ $cart->product_quantity * $cart->product->price;
         @endphp
         {{$cart->product_quantity * $cart->product->price}} Taka
       </td>
       <td>
         <form class="form-inline" action="{{route('carts.delete', $cart->id)}}" method="post">
           @csrf
           <input type="hidden" name="cart_id">
           <button type="submit" class="btn btn-danger">Delete</button>
         </form>
       </td>
     </tr>
     <tr>
       <td colspan="4">
         <td >
           Total Amount
         </td>

         <td colspan="2">
          <strong>{{$total_price}} Taka</strong>
         </td>
       </td>
     </tr>
   @endforeach
     </table>

     <div class="float-right">
       <a href="{{route('products')}}" class="btn btn-info">Continue Shopping...</a>
       <a href="{{route('checkout')}}" class="btn btn-warning">Checkout</a>
     </div>

     @else

      <div class="alert alert-warning">
        <strong>There is no item in your cart</strong>
        <a href="{{route('products')}}" class="btn btn-info ml-2">Continue Shopping...</a>
      </div>

     @endif

  </div>
</div>



@endsection
