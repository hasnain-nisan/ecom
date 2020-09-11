@extends('admin.layouts.master')
@section('content')

       <div class="main-panel">

        <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
              <h3>Edit Category</h3>
            </div>
            <div class="card-body">
              <form class="form-horizontal" role="form" action="{{route('admin.category.update', $category->id)}}" method="post" enctype="multipart/form-data">
                @csrf()

                <div class="form-group">
                  <label class="control-label col-sm-2" for="name">Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ $category->name}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="description">Description:</label>
                  <div class="col-sm-10">
                    <textarea name="description" rows="8" cols="80" class="form-control">{{ $category->description }}</textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="parent_id">Parent category:</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="parent_id">
                      <option value="">Please select a parent category (Optional)</option>
                      @foreach($main as $cat)
                       <option value="{{$cat->id}}" {{ $cat->id == $category->parent_id? 'selected' : '' }}>{{$cat->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="old_image">Category old image:</label>
                    <div class="col-sm-6">
                      <img src="{!! asset('images/categories/'.$category->image) !!}" width="100" height="100">
                    </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="image">Category new image:</label>
                    <div class="col-sm-6">
                      <input type="file" class="form-control" name="image">
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Update Category</button>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
       </div>
@endsection
