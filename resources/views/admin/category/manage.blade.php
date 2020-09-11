@extends('admin.layouts.master')
@section('content')

       <div class="main-panel">
        <div class="content wrapper">
          <div class="card ">
            <div class="card-header">
              <h3>Manage Product</h3>
            </div>

            <div class="card-body">
              <table class="table table-responsive table-hover">
                <tr>
                  <th>Serial Number</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Parent ID</th>
                  <th>Category Image</th>
                  <th>Action</th>
                </tr>
                @php $i=0; @endphp
                @foreach($categories as $category)
                @php $i++; @endphp
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->description }}</td>
                  <td>
                    @if($category->parent_id == NULL)
                     primary category
                    @else
                     {{$category->parent->name}}
                    @endif
                  </td>
                  <td>
                   <img src="{!! asset('images/categories/'.$category->image) !!}" width="100" height="100">
                  </td>
                  <td>
                    <div class="btn-group">
                      <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-success">Edit</a>
                      <a href="#deleteModal{{$category->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>
                       <!-- delete modal -->
                        @include('admin.partials.categoryDeleteModal')
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
