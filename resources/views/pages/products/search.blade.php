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
        <h3>Searched products for <span class="badge badge-primary">{{$search}}</span></h3> 
        @include('partials.allproducts')
    </div>


  </div>

</div>
</div>

<!--end of sidebar+content-->
@endsection
