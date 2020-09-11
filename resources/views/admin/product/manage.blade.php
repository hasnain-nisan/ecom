@extends('admin.layouts.master')
@section('content')

       <div class="main-panel">
        <div class="content wrapper">
          <div class="card ">
            <div class="card-header">
              <h3>Manage Product</h3>
            </div>

            <div class="card-body">
              <table class="table table-responsive table-hover" id="dataTable">
                <thead>
                  <tr>
                      <td>Serial Number</td>
                      <td>Title</td>
                      <td>Description</td>
                      <td>Price(tk)</td>
                      <td>Quantity</td>
                      <td>Brand</td>
                      <td>Category</td>
                      <td>Product Image</td>
                      <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @php $i=0; @endphp
                    @foreach($products as $product)
                    @php $i++; @endphp
                    <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $product->title }}</td>
                      <td>{{ $product->description }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->quantity }}</td>
                      <td>
                        {{ $product->brand->name }}
                      </td>
                      <td>
                        {{ $product->category->name }}
                      </td>
                      <td>
                        @php $j=1; @endphp
                       @foreach($product->images as $image)
                      @if($j>0)
                       <img class="card-img-top width" src="{!! asset('images/products/' .$image->image) !!}" alt="Card image cap" height="100px" width="100px">
                      @endif
                      @php $j--; @endphp
                      @endforeach
                     </td>
                      <td>
                        <div class="btn-group">
                          <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-success">Edit</a>
                          <a href="#deleteModal{{$product->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>
                           <!-- delete modal -->
                           @include('admin.partials.ProductDeleteModal')
                        </div>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>


          </div>
        </div>
        </div>

@endsection
