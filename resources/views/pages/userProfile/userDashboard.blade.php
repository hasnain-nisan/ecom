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

            <h3><span class="badge badge-danger">Wellcome {{$user->username}}</span></h3>
            <p>Here you can view and update all of your informations</p>
            <hr>

            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-info">
                        <div class="card-body mt-2 pointer" onclick="location.href='{{route('profile.view', $user->id)}}'">
                          <center>
                          <h6> View Profile</h6>
                          </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-info">
                        <div class="card-body mt-2 pointer" onclick="location.href='{{route('profile.edit', $user->id)}}'">
                          <center>
                          <h6> Update Profile</h6>
                          </center>
                        </div>
                    </div>
                </div>
            </div>

      </div>

   </div>

 </div>
</div>

</div>


 @endsection
