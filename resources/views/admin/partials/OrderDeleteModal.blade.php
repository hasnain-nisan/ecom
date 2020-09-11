<div id="deleteModal{{$order->id}}" class="modal fade" role="dialog">
 <div class="modal-dialog">

   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header">
       <p> Are you sure, that you want to delete?</p>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
     <div class="modal-body">
       <p>Please be sure the order you want to delete is completed</p>
       <form class="" action="{{route('admin.order.delete', $order->id)}}" method="post">
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
