@extends('admin.layouts.master')
@section('content')

       <div class="main-panel">

        <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
              <h3>Edit Division</h3>
            </div>
            <div class="card-body">
              <form class="form-horizontal" role="form" action="{{route('admin.division.update', $division->id)}}" method="post" enctype="multipart/form-data">
                @csrf()

                <div class="form-group">
                  <label class="control-label col-sm-2" for="name">Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ $division->name}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="priority">Priority:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="priority" value="{{$division->priority}}">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Update Division</button>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
       </div>
@endsection
