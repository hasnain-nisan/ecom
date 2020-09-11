@extends('layouts.master')

@section('content')

<div class="container mt-2">
  <div class="row">
    <div class="col-md-4">
      @include('pages.userProfile.sidebar')
    </div>

  <div class="col-md-8">
    <div class="card card-body">
      <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
          @csrf

          <div class="form-group row">
              <label for="first_name" class="col-md-4 col-form-label text-md-right">First name:</label>

              <div class="col-md-6">
                  <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" required autocomplete="first_name" autofocus>

                  @error('first_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="last_name" class="col-md-4 col-form-label text-md-right">Last name:</label>

              <div class="col-md-6">
                  <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name" autofocus>

                  @error('last_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="username" class="col-md-4 col-form-label text-md-right">Username:</label>

              <div class="col-md-6">
                  <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username" autofocus>

                  @error('username')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="gender" class="col-md-4 col-form-label text-md-right">Gender:</label>

              <div class="col-md-6">
                <select class="form-control" name="gender">
                  <option value="">Please select your gender</option>
                   <option value="male" {{$user->gender == 'male' ? 'selected' : ''}}>Male</option>
                   <option value="female" {{$user->gender == 'female' ? 'selected' : ''}}>Female</option>
                   <option value="other" {{$user->gender == 'other' ? 'selected' : ''}}>Other</option>
                </select>
                  @error('gender')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="phone_numb" class="col-md-4 col-form-label text-md-right">Phone number</label>

              <div class="col-md-6">
                  <input id="phone_numb" type="text" class="form-control @error('phone_numb') is-invalid @enderror" name="phone_numb" value="{{ $user->phone_numb }}" required autocomplete="phone_numb" autofocus>

                  @error('phone_numb')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="photo" class="col-md-4 col-form-label text-md-right">profile picture:</label>

              <div class="col-sm-6">
                <input type="file" class="form-control" name="photo">

                  @error('photo')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">New Password:</label>

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" >

              </div>
          </div>


          <div class="form-group row">
              <label for="street_add" class="col-md-4 col-form-label text-md-right">Street address:</label>

              <div class="col-md-6">
                  <input id="street_add" type="street_add" class="form-controlr" name="street_add" value="{{$user->street_add}}">

              </div>
          </div>

          <div class="form-group row">
              <label for="division_id" class="col-md-4 col-form-label text-md-right">Division:</label>

              <div class="col-md-6">
                <select class="form-control" name="division_id" id="division_id">
                  <option value="">Please select a division</option>
                  @foreach($divisions as $division)
                   <option value="{{$division->id}}" id="division_id" {{$division->id == $user->division_id ? 'selected' : ''}}>{{$division->name}}</option>
                  @endforeach
                </select>
              </div>
          </div>

          <div class="form-group row">
              <label for="district_id" class="col-md-4 col-form-label text-md-right">District:</label>

              <div class="col-md-6">
                <select class="form-control" name="district_id" id="district">
                  <option value="">Please select a district</option>
                </select>
              </div>
          </div>



          <div class="form-group row">
              <label for="shipping_add" class="col-md-4 col-form-label text-md-right">Shipping address:</label>

              <div class="col-md-6">
                  <input id="shipping_add" type="shipping_add" class="form-control" name="shipping_add" value="{{$user->shipping_add}}">

              </div>
          </div>

          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Update Profile
                  </button>
              </div>
          </div>
      </form>
   </div>

 </div>
</div>

</div>


@endsection
@section('scripts')
<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<!-- Jquery code for division wise disyrict -->
<script>
     $("#division_id").change(function(){
       let division = $("#division_id").val();
       $("#district").html("");
       let option = "";
       $.get("http://localhost/bolg/public/districts/"+division, function(data) {
         let data = JSON.parse(data);
         data.forEach(function(element) {
           option += "<option value = '"+element.id+"'>"+element.name+"</option>"
         });
         $("#district").html(option);
       });
     })
</script>
@endsection
