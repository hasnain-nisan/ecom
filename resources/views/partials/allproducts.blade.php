

    <div class="row">
      @foreach($products as $product)
      <div class="col-md-4">
        <div class="card">

       @php $i=1; @endphp
        @foreach($product->images as $image)
       @if($i>0)
       <a href="{{ route('product.show', $product->slug) }}"><img class="card-img-top width" src="{{asset('images/products/' .$image->image)}}" alt="{{$product->title}}"></a>
       @endif
       @php $i--; @endphp
        @endforeach

        <div class="card-body">
          <h5 class="card-title"><a href="{{ route('product.show', $product->slug) }}">{{$product->title}}</a></h5>
          <span class="badge badge-success">{{ $product->category->name }}</span>
          <span class="badge badge-danger">{{ $product->brand->name }}</span><hr>
          <p class="card-text">{{$product->description}}</p>
          <p class="card-text">Tk:{{$product->price}}</p>
          @include('partials.cart')
        </div>
      </div>
     </div>
      @endforeach


  </div>

 <div class="mt-4 pagination">
  {{$products->links()}}
 </div>
