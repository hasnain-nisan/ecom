@extends('admin.layouts.master')
@section('content')

       <div class="main-panel">

        <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
              <h3>Add Brand</h3>
            </div>
            <div class="card-body">
              <form class="form-horizontal" role="form" action="{{route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
                @csrf()

                <div class="form-group">
                  <label class="control-label col-sm-2" for="name">Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Enter the brand name"></input>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="description">Description:</label>
                  <div class="col-sm-10">
                    <textarea name="description" rows="8" cols="80" class="form-control" placeholder="Enter brand description"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="image">Brand Image:</label>
                    <div class="col-sm-6">
                      <input type="file" class="form-control" name="image">
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Add Brand</button>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
       </div>
@endsection
