@extends('admin.layouts.master')
@section('content')

        <div class="card text-center">
            <div class="card-header">
              <h3>Manage Orders</h3>
            </div>

            <div class="card-body">
              <table class="table table-responsive table-hover table-bordered table-stripe" id="dataTable">
               <thead>
                 <tr>
                   <th>Serial Number</th>
                   <th>Order ID</th>
                   <th>Orderer name</th>
                   <th>Orderer phone number</th>
                   <th>Order status</th>
                   <th>Action</th>
                 </tr>
               </thead>

                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td> {{$loop->index + 1}} </td>
                    <td>LEO{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone_numb }}</td>
                    <td>
                     <div class="btn-group" role="group">
                       <p>
                        @if($order->is_seen_by_admin)
                         <button type="button" class="btn btn-success ml-2">Seen</button>
                        @else
                         <button type="button" class="btn btn-danger ml-2">Unseen</button>
                        @endif
                       </p>
                       <p>
                        @if($order->is_paid)
                         <button type="button" class="btn btn-success ml-2">Paid</button>
                        @else
                         <button type="button" class="btn btn-danger ml-2">Unpaid</button>
                        @endif
                       </p>
                       <p>
                        @if($order->is_completed)
                         <button type="button" class="btn btn-success ml-2">Complete</button>
                        @else
                         <button type="button" class="btn btn-danger ml-2">Incomplete</button>
                        @endif
                       </p>
                     </div>
                    </td>
                    <td>
                      <div class="btn-group">
                        <a href="{{route('admin.order.show', $order->id)}}" class="btn btn-info">View</a>
                       <a href="#deleteModal{{$order->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>
                         <!-- delete modal -->
                          @include('admin.partials.OrderDeleteModal')
                      </div>
                    </td>
                  </tr>
                    @endforeach
                </tbody>


              </table>
            </div>


          </div>


@endsection
