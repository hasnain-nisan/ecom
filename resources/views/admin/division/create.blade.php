@extends('admin.layouts.master')
@section('content')

       <div class="main-panel">
       <div class="row">
        <div class="content-wrapper col-sm-6">
          <div class="card">
            <div class="card-header">
              <h3><span class="badge badge-success">Add Division</span></h3>
            </div>
            <div class="card-body">
              <form class="form-horizontal" role="form" action="{{route('admin.division.store')}}" method="post" enctype="multipart/form-data">
                @csrf()

                <div class="form-group">
                  <label class="control-label col-sm-2" for="name"><span class="badge badge-primary">Division name:</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Enter the division name"></input>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="priority"><span class="badge badge-primary">Priority</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="priority" placeholder="Enter the division priority:"></input>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Add Division</button>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>

        <div class="content-wrapper col-sm-6">
          <div class="card">
            <div class="card-header">
              <h3><span class="badge badge-success">Manage Division</span></h3>
            </div>
            <div class="card-body">
              <table class="table table-responsive table-hover">
                <tr>
                  <th>Serial Number</th>
                  <th>Name</th>
                  <th>Priority</th>
                  <th>Action</th>
                </tr>
                @php $i=0; @endphp
                @foreach($divisions as $division)
                @php $i++; @endphp
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $division->name }}</td>
                  <td>{{ $division->priority }}</td>
                  <td>
                    <div class="btn-group">
                      <a href="{{route('admin.division.edit', $division->id)}}" class="btn btn-success">Edit</a>
                      <form class="form-inline" action="{{route('admin.division.delete', $division->id)}}" method="post">
                       {{ csrf_field() }}
                       <input type="submit" class="btn btn-danger" name="delete" value="delete">
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>

          </div>
        </div>

       </div>
      </div>

@endsection
