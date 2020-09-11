<div class="list-group">
  <a href="" class="list-group-item">
   <img src="{{asset('images/users/' .$user->photo)}}" class="img rounded-circle" style="width:150px" alt="">
  </a>
  <a href="{{route('dashboard')}}" class="list-group-item {{ Route::is('dashboard')? 'active' : '' }}">Dashboard</a>
  <a href="{{route('profile.view', $user->id)}}" class="list-group-item {{ Route::is('profile.view')? 'active' : '' }}">View Personal Information</a>
  <a href="{{route('profile.edit', $user->id)}}" class="list-group-item {{ Route::is('profile.update')? 'active' : '' }}">Update Profile</a>
</div>
