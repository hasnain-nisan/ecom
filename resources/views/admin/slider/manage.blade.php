@extends('admin.layouts.master')
@section('content')

 <div class="content">
   <div class="main-panel">
     <div class="content-wrapper">

       <div class="card mt-2">
           <div class="card-header">
             <h3>Manage Sliders</h3>
           </div>

           <div class="card-body">
             <div class="card-body">
               <a href="#addSliderModal" data-toggle="modal" class="btn btn-info float-right mb-2">Add new slider</a>


             <!-- add slider Modal -->
             <div id="addSliderModal" class="modal fade" role="dialog">
               <div class="modal-dialog">

                 <!-- Modal content-->
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">Add new slider</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div>
                   <div class="modal-body">
                    <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                      @csrf()

                      <div class="form-group">
                        <label for="title"> Slider title <small class="text-danger">(required)</small> : </label>
                        <input type="text" class="form-control" name="title" placeholder="Enter title" required>
                      </div>
                      <div class="form-group">
                        <label for="image"> Slider image <small class="text-danger">(required)</small> : </label>
                        <input type="file" class="form-control" name="image" placeholder="Enter image" required>
                      </div>
                      <div class="form-group">
                        <label for="button_text"> Slider button text <small class="text-primary">(optional)</small> : </label>
                        <input type="text" class="form-control" name="button_text" placeholder="Enter slider button text">
                      </div>
                      <div class="form-group">
                        <label for="button_link"> Slider button link <small class="text-primary">(optional)</small> : </label>
                        <input type="text" class="form-control" name="button_link" placeholder="Enter slider button link">
                      </div>
                      <div class="form-group">
                        <label for="priority"> Slider priority <small class="text-danger">(required)</small> : </label>
                        <input type="number" class="form-control" name="priority" placeholder="Enter slider priority" required>
                      </div>

                      <button type="submit" class="btn btn-success">Add new slider</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                    </form>
                   </div>
                 </div>

               </div>
             </div>
             </div>




             <table class="table table-hover table-stripe" id="">
              <thead>
                <tr>
                  <th>Serial Number</th>
                  <th>Slider ID</th>
                  <th>Slider Title</th>
                  <th>Slider Image</th>
                  <th>Slider button text</th>
                  <th>Slider button link</th>
                  <th>Slider Priority</th>
                  <th>Action</th>
                </tr>
              </thead>

               <tbody>
                 @foreach($sliders as $slider)
                 <tr>
                   <td> {{$loop->index + 1}} </td>
                   <td> {{ $slider->id }}</td>
                   <td> {{ $slider->title }} </td>
                   <td>
                     <img src="{!! asset('images/sliders/' .$slider->iamge) !!}" height="100px" width="100px">
                   </td>
                   <td>{{ $slider->button_text }}</td>
                   <td>{{ $slider->button_link }}</td>
                   <td> {{ $slider->priority }} </td>
                   <td>
                     <div class="btn-group">
                       <a href="#editSliderModal{{$slider->id}}" data-toggle="modal" class="btn btn-primary">Edit</a>

                       <!-- add slider Modal -->
                       <div id="editSliderModal{{$slider->id}}" class="modal fade" role="dialog">
                         <div class="modal-dialog">

                           <!-- Modal content-->
                           <div class="modal-content">
                             <div class="modal-header">
                               <h4 class="modal-title">Update slider</h4>
                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                             </div>
                             <div class="modal-body">
                              <form action="{{route('admin.slider.update', $slider->id)}}" method="post" enctype="multipart/form-data">
                                @csrf()

                                <div class="form-group">
                                  <label for="title"> Slider title <small class="text-danger">(required)</small> : </label>
                                  <input type="text" class="form-control" name="title" value="{{$slider->title}}" required>
                                </div>
                                <div class="form-group">
                                  <label for="image"> Slider image <small class="text-danger">(required)</small> : </label>
                                  <a href="{{asset('images/sliders/'.$slider->iamge)}}">Current Image</a>
                                  <input type="file" class="form-control" name="image" placeholder="Enter image">
                                </div>
                                <div class="form-group">
                                  <label for="button_text"> Slider button text <small class="text-primary">(optional)</small> : </label>
                                  <input type="text" class="form-control" name="button_text" value="{{$slider->button_text}}">
                                </div>
                                <div class="form-group">
                                  <label for="button_link"> Slider button link <small class="text-primary">(optional)</small> : </label>
                                  <input type="text" class="form-control" name="button_link" value="{{$slider->button_link}}">
                                </div>
                                <div class="form-group">
                                  <label for="priority"> Slider priority <small class="text-danger">(required)</small> : </label>
                                  <input type="number" class="form-control" name="priority" value="{{$slider->priority}}" required>
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                              </form>
                             </div>
                           </div>

                         </div>
                       </div>

                      <a href="#deleteSliderModal{{$slider->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                      <!-- delete slider Modal -->
                      <div id="deleteSliderModal{{$slider->id}}" class="modal fade" role="dialog">
                       <div class="modal-dialog">

                         <!-- Modal content-->
                         <div class="modal-content">
                           <div class="modal-header">
                             <p> Are you sure, that you want to delete?</p>
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                           <div class="modal-body">
                             <p>Once you have deleted a slider, you cant restore it</p>
                             <form class="" action="{{route('admin.slider.delete', $slider->id)}}" method="post">
                              @csrf()
                                 <button type="submit" class="btn btn-danger" >Yes</button>
                                 <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                            </form>
                           </div>
                         </div>

                       </div>
                      </div>

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

 </div>



@endsection
