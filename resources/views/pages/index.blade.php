@extends('layouts.master')

@section('content')
<!--start of sidebar+content-->
<!-- Slider -->
<div class="slider">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
  @foreach($sliders as $slider)
   <li data-target="#myCarousel" data-slide-to="{{$loop->index}}" class="{{$loop->index == 0 ? 'active' : '' }}"></li>
  @endforeach
</ol>

<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
  @foreach($sliders as $slider)
  <div class="carousel-item {{$loop->index == 0 ? 'active' : '' }}">
    <img class="d-block w-100" src="{{asset('images/sliders/'.$slider->iamge)}}" alt="{{$slider->title}}" style="height:450px;">

    <div class="carousel-caption">
        <h3>{{$slider->title}}</h3>
        @if($slider->button_text)
        <a href="{{$slider->button_link}}">{{$slider->button_text}}</a>
        @endif
      </div>
  </div>
  @endforeach
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
</div>

<div class="container margin-top-20">
  <div class="row mt-2">
    <div class="col-md-4 sidebar">
      @include('partials.sidebar')
    </div>
    <div class="col-md-8">
    <div class="widget">
      <h3>Featured Products</h3>
      @include('partials.allproducts')
    </div>
  </div>
</div>
</div>

<!--end of sidebar+content-->
@endsection
