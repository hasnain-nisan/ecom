<div id="deleteModal{{$brand->id}}" class="modal fade" role="dialog">
 <div class="modal-dialog">

   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header">
       <p> Are you sure? that you want to delete?</p>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
     <div class="modal-body">
       <p>Deleting any brand will delete the brand permanently</p>
       <form class="" action="{{route('admin.brand.delete', $brand->id)}}" method="post">
        @csrf()
         <div class="modal-footer">
           <button type="submit" class="btn btn-danger" >Yes</button>
           <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
         </div>
      </form>
     </div>
   </div>

 </div>
</div>
