@extends('admin.layouts.master')
@section('content')

       <div class="main-panel">
        <div class="content wrapper">
          <div class="card ">
            <div class="card-header">
              <h3>Manage Brand</h3>
            </div>

            <div class="card-body">
              <table class="table table-responsive table-hover">
                <tr>
                  <th>Serial Number</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Brand Image</th>
                  <th>Action</th>
                </tr>
                @php $i=0; @endphp
                @foreach($brands as $brand)
                @php $i++; @endphp
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $brand->name }}</td>
                  <td>{{ $brand->description }}</td>
                  <td>
                   <img src="{!! asset('images/brands/'.$brand->image) !!}" width="100" height="100">
                  </td>
                  <td>
                    <div class="btn-group">
                      <a href="{{route('admin.brand.edit', $brand->id)}}" class="btn btn-success">Edit</a>
                      <a href="#deleteModal{{$brand->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>
                       <!-- delete modal -->
                        @include('admin.partials.brandDeleteModal')
                    </div>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>


          </div>
        </div>
        </div>

@endsection
