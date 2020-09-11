@extends('layouts.master')
@section('title')
{{ $product->title}} | Laravel Ecommerce
@endsection
@section('content')
<!--start of sidebar+content-->
<div class="container margin-top-20">
  <div class="row">

    <div class="col-md-4">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
        @php $i=1; @endphp
        @foreach($product->images as $image)

          <div class="image carousel-item {{ $i == 1 ? 'active' : ''}}">
            <img src="{{ asset('images/products/' .$image->image) }}" alt="" style="width:300px; height:500px; text-align:center">
          </div>
        @php $i++ @endphp
        @endforeach
      </div>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>



    <div class="col-md-8">
      <div class="widget">
        <h3>{{$product->title}}</h3>
         <span class="badge badge-success">{{$product->category->name}}</span> <span class="badge badge-danger">{{$product->brand->name}}</span>
        <hr>
        <p>
          <h5>Price:{{$product->price}} taka</h5>
        <span class="badge badge-primary">
         {{ $product->quantity < 1 ? 'No item is available in the stock' : $product->quantity .' items is available in the stock'}}
        </span>
        <hr>
        <br>
      </p>
        <div class="product-description">
          {{$product->description}}
        </div>
        <hr>
        @include('partials.cart')

    </div>



  </div>

</div>
</div>

<!--end of sidebar+content-->
@endsection
