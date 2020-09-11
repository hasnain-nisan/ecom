@extends('admin.layouts.master')
@section('content')

       <div class="main-panel">

        <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
              <h3>Add Product</h3>
            </div>
            <div class="card-body">
              <form class="form-horizontal" role="form" action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                @csrf()

                <div class="form-group">
                  <label class="control-label col-sm-2" for="title">Title:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" placeholder="Enter the product title">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="description">Description:</label>
                  <div class="col-sm-10">
                    <textarea name="description" rows="8" cols="80" class="form-control" placeholder="Enter product description"></textarea>
                  </div>
                </div>

               <div class="form-group">
                  <label class="control-label col-sm-2" for="price">Price:</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="price" placeholder="Enter the product price">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="quantity">Quantity:</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="quantity" placeholder="Enter product quantity">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="brand_id">Brand:</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="brand_id">
                      <option value="">Please select a brand</option>
                      @foreach(App\Brand::orderby('id', 'asc')->get() as $brand)
                       <option value="{{$brand->id}}">{{$brand->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="category_id">Category:</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="category_id">
                      <option value="">Please select a category</option>
                      @foreach(App\Category::orderby('id', 'asc')->where('parent_id', NULL)->get() as $parent)
                       <option value="{{$parent->id}}">{{$parent->name}}</option>
                       @foreach(App\Category::orderby('id', 'asc')->where('parent_id', $parent->id)->get() as $child)
                       <option value="{{$child->id}}">-->{{$child->name}}</option>
                       @endforeach
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="product_image">Image:</label>


                    <div class="col-sm-6">
                      <input type="file" class="form-control" name="product_image[]">
                    </div>
                    <div class="col-sm-6">
                      <input type="file" class="form-control" name="product_image[]">
                    </div>
                    <div class="col-sm-6">
                      <input type="file" class="form-control" name="product_image[]">
                    </div>
                    <div class="col-sm-6">
                      <input type="file" class="form-control" name="product_image[]">
                    </div>
                    <div class="col-sm-6">
                      <input type="file" class="form-control" name="product_image[]">
                    </div>


                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Add product</button>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
       </div>
@endsection
