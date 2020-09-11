@extends('layouts.master')

@section('content')

<div class="container mt-2">
  <div class="row">
    <div class="col-md-4">
      @include('pages.userProfile.sidebar')
    </div>

  <div class="col-md-8">
    <div class="card card-body">

      <div class="container">
       <h3>{{$user->username}} personal informations</h3>
       <hr>

        <div class="card-body">
         <table>
           <tr>
            <th>Username:</th>
            <td>{{$user->username}}</td>
           </tr>

           <tr>
             <th>First name:</th>
             <td>{{$user->first_name}}</td>
           </tr>

           <tr>
             <th>Last name:</th>
             <td>{{$user->last_name}}</td>
           </tr>

           <tr>
             <th>Profile Photo:</th>
             <td>
               <img src="{{asset('images/users/' .$user->photo)}}" class="img rounded-circle" style="width:150px" alt="">
             </td>
           </tr>

           <tr>
             <th>Gender:</th>
             <td>{{$user->gender}}</td>
           </tr>

           <tr>
             <th>Phone Number:</th>
             <td>{{$user->phone_numb}}</td>
           </tr>

           <tr>
             <th>E-mail:</th>
             <td>{{$user->email}}</td>
           </tr>

             <tr>
              <th>Street Address:</th>
              <td>{{$user->street_add}}</td>
             </tr>

             <tr>
               <th>District</th>
               <td>{{$user->district_id}}</td>
             </tr>

             <tr>
               <th>Division:</th>
               <td>{{$user->division_id}}</td>
             </tr>

           <tr>
            <th>Shipping Address:</th>
            <td>{{$user->shipping_add}}</td>
           </tr>
           </table>
         </div>
        </div>



      </div>


   </div>

 </div>
</div>

</div>


@endsection
