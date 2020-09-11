@extends('layouts.master')

@section('content')

<div class="container margin-top-20">
  <div class="row">
   <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Confirm Purchasing Items</h4>
      </div>

      <div class="card-body ">
        <div class="row">
          <div class="col-md-7">
            <table class="table table-bordered">
              <tr>
                <th>serial</th>
                <th>product title</th>
                <th>product quantity</th>
                <th>Unit Price</th>
              </tr>
          @foreach(App\Cart::totalCarts() as $cart)
            <tr>
              <td>{{$loop->index + 1}}</td>
              <td>{{$cart->product->title}}</td>
              <td>{{$cart->product_quantity}}</td>
              <td>{{$cart->product->price}} Taka</td>
            </tr>
          @endforeach
            </table>
            <a href="{{route('carts')}}"><span class="badge badge-warning">Change your cart items</span></a>
          </div>
          <div class="col-md-5 border-left">
            @php
            $total_price = 0;
            @endphp
            @foreach(App\Cart::totalCarts() as $cart)
            @php
            $total_price += $cart->product_quantity * $cart->product->price;
            @endphp
            @endforeach
            <p>Total Price = <strong>{{$total_price}} Taka</strong></p>
            <p>Shipping Cost = </p>
            <p>Total Price with shipping cost = </p>
          </div>
        </div>

      </div>
     </div>

     <div class="card mt-2">
       <div class="card-header">
        <h4>Shipping Informations</h4>
       </div>
       <div class="card-body">
             <form method="POST" action="{{route('checkout.store')}}" enctype="multipart/form-data">
                 @csrf

                 <div class="form-group row">
                     <label for="reciever_name" class="col-md-4 col-form-label text-md-right">Reciever name:</label>

                     <div class="col-md-6">
                         <input id="reciever_name" type="text" class="form-control @error('reciever_name') is-invalid @enderror" name="reciever_name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}" required autocomplete="reciever_name" autofocus>

                         @error('reciever_name')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="reciever_phone" class="col-md-4 col-form-label text-md-right">Reciever phone number:</label>

                     <div class="col-md-6">
                         <input id="reciever_phone" type="text" class="form-control @error('reciever_phone') is-invalid @enderror" name="reciever_phone" value="{{ Auth::check() ? Auth::user()->phone_numb : '' }}" required autocomplete="reciever_name" autofocus>

                         @error('reciever_phone')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="reciever_email" class="col-md-4 col-form-label text-md-right">Reciever email:</label>

                     <div class="col-md-6">
                         <input id="reciever_email" type="email" class="form-control @error('first_name') is-invalid @enderror" name="reciever_email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required autocomplete="reciever_email" autofocus>

                         @error('reciever_email')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                 </div>
                <div class="form-group row">
                     <label for="shipping_add" class="col-md-4 col-form-label text-md-right">Shipping address:</label>

                     <div class="col-md-6">
                         <textarea name="shipping_add" rows="4" cols="40">{{ Auth::check() ? Auth::user()->shipping_add : '' }}</textarea>
                     </div>
                 </div>

                 <div class="form-group row">
                      <label for="aditional_msg" class="col-md-4 col-form-label text-md-right">Additional Message(Optional):</label>

                      <div class="col-md-6">
                          <textarea name="aditional_msg" rows="4" cols="40"></textarea>
                      </div>
                  </div>

                 <div class="form-group row">
                     <label for="payment_method" class="col-md-4 col-form-label text-md-right">Select a payment method:</label>

                     <div class="col-md-6">
                       <select class="form-control" name="payment_method" id="payment">
                         <option value="">Please select a payment method</option>
                         @foreach($payments as $payment)
                          <option value="{{$payment->short_name}}" id="payment_method">{{$payment->name}}</option>
                         @endforeach
                       </select>

                     @foreach($payments as $payment)

                       @if($payment->short_name == "cash_delivery")
                        <div class="alert alert-success text-center mt-4 hidden" id="payment_{{$payment->short_name}}">
                          <h4>Payment Method : Cash On Delivery</h4>
                          <br>
                          <small>Just confirm the order now, and we will recive payment when the product is shipped</small>
                        </div>
                        @else
                        <div class="alert alert-success text-center mt-4 hidden" id="payment_{{$payment->short_name}}">
                          <h4>Pyament method : {{$payment->name}}</h4>
                          <br>
                          <h6>{{$payment->name}} account number : {{$payment->number}}</h6>
                          <h6>{{$payment->name}} account type : {{$payment->type}}</h6>

                          <div class="alert alert-danger">
                            Please send the total amount to the {{$payment->name}} number, and input your transaction ID.
                          </div>
                          </div>
                       @endif

                       @endforeach
                      <div class="hidden" id="transaction_id">
                        <label for="transaction_id">Your Transaction id:</label>
                        <input type="text" name="transaction_id" class="form-control" placeholder="Your transaction ID">

                      </div>

                     </div>
                     </div>


                 <div class="form-group row mb-0">
                     <div class="col-md-6 offset-md-4">
                         <button type="submit" class="btn btn-primary">
                           Order Now
                         </button>
                     </div>
                 </div>
             </form>
              </div>
       </div>

     </div>

    </div>
  </div>
</div>


@endsection
@section('scripts')

<script type="text/javascript">
  $("#payment").change(function(){
    $payment_method = $("#payment").val();
    if($payment_method == "cash_delivery") {
      $("#payment_cash_delivery").removeClass('hidden');
      $("#payment_B_kash").addClass('hidden');
      $("#payment_D_rocket").addClass('hidden');
      $("#payment_DB_nagad").addClass('hidden');
    } else if ($payment_method == "B_kash") {
      $("#payment_B_kash").removeClass('hidden');
      $("#payment_cash_delivery").addClass('hidden');
      $("#payment_D_rocket").addClass('hidden');
      $("#payment_DB_nagad").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    } else if ($payment_method == "D_rocket") {
      $("#payment_D_rocket").removeClass('hidden');
      $("#payment_cash_delivery").addClass('hidden');
      $("#payment_B_kash").addClass('hidden');
      $("#payment_DB_nagad").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    } else if ($payment_method == "DB_nagad") {
      $("#payment_DB_nagad").removeClass('hidden');
      $("#payment_cash_delivery").addClass('hidden');
      $("#payment_B_kash").addClass('hidden');
      $("#payment_D_rocket").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    }
  })
</script>

@endsection
