@extends('layouts.master')

@section('content')
<!--start of sidebar+content-->
<div class="container margin-top-20">
  <div class="row">

    <div class="col-md-4 sidebar">
      @include('partials.sidebar')
    </div>


    <div class="col-md-8">
      <div class="widget">
        <h3>All products in <span class="badge badge-info">{{ $categories->name }}</span> category</h3>
        @php
         $products = $categories->products()->paginate(1);
        @endphp
        @if($products->count() > 0)
          @include('partials.allproducts')
        @else
          <div class="alert alert-warning">
            <p>No products is available in the {{$categories->name}} category</p>
          </div>
        @endif
    </div>


  </div>

</div>
</div>

<!--end of sidebar+content-->
@endsection
