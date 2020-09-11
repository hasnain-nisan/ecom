@extends('admin.layouts.master')
@section('content')


<!--start of sidebar+content-->
<div class="container mt-2 mb-2">
  <div class="main-content">
    <div class="content-wraper">
      <div class="card">
        <div class="card-header">
          View Order LEO{{$order->id}}
        </div>

        <div class="card-body">

          <div class="card">
            <div class="card-header">
              Order Information
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 border-right">
                  <p> <strong>Orderer Name : </strong> {{$order->name}} </p>
                  <p> <strong>Orderer Phone Number : </strong> {{$order->phone_numb}} </p>
                  <p> <strong>Orderer Email : </strong> {{$order->email}} </p>
                  <p> <strong>Orderer Shipping Address : </strong> {{$order->shipping_address}} </p>
                </div>
                <div class="col-md-6">
                  <p> <strong>Payment Method :</strong> {{$order->payment->name}} </p>
                  <p> <strong>Payment Transaction ID :</strong> {{$order->transaction_id}} </p>
                  <p> <strong>Order message :</strong> {{$order->message}} </p>
                </div>
              </div>
            </div>

            </div>


            <div class="card mt-2">
              <div class="card-header">
                Ordered Products
              </div>
              <div class="card-body">
                @if(count($order->carts)>0)
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td>Serial no.</td>
                      <td>Product Title</td>
                      <td>Product Image</td>
                      <td>Quantity</td>
                      <td>Unit price</td>
                      <td>Total price</td>
                      <td>Delete</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    @php $Totalprice = 0; @endphp
                    @foreach($order->carts as $cart)
                    <tr>
                      <td>{{$loop->index + 1}}</td>
                      <td>
                       <a href="{{route('product.show', $cart->product->slug)}}">{{$cart->product->title}}</a>
                      </td>
                      <td>
                        @if($cart->product->images->count()>0)
                       <img src="{{asset('images/products/' .$cart->product->images->first()->image)}}" width="60px">
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
                      <td>
                        <div class="btn-group" role="group">
                       <form class="form-inline" action="{{route('admin.order.paid', $order->id)}}" method="post">
                        @csrf
                        @if($order->is_paid)
                        <input type="submit" value="Not paid" class="btn btn-danger mr-2">
                        @else
                        <input type="submit" value="Paid" class="btn btn-success mr-2">
                        @endif
                       </form>
                       <form class="form-inline" action="{{route('admin.order.completed', $order->id)}}" method="post">
                        @csrf
                        @if($order->is_completed)
                        <input type="submit" value="Not complete" class="btn btn-danger">
                        @else
                        <input type="submit" value="Completed" class="btn btn-success">
                        @endif
                       </form>
                     </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
              </div>

            </div>

          </div>


      </div>

    </div>

  </div>
</div>

<!--end of sidebar+content-->
@endsection
