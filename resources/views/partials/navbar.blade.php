<!--Start of navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 <div class="container">
<a class="navbar-brand" href="{{route('index')}}">Laravel Ecommerce</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto mr-nav-element">
    <li class="nav-item">
      <a class="nav-link" href="{{route('index')}}">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('products')}}">Products</a>
    </li>
    <li class="nav-item">
      <form class="form-inline my-2 my-lg-0 mt-4" name="search" action="{{route('search')}}" method="get">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search products" aria-label="search products" aria-describedby="basic-addon2" name="search">
        <div class="form-group">
          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </form>
    </li>
    <!--<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </li> -->

  </ul>
  <ul class="navbar-nav ml-auto ml-nav-element">
      <!-- Authentication Links -->
     <a href="{{route('carts')}}">
      <button class="btn btn-danger">
       <span>Cart</span>
       <span class="badge badge-primary">
         {{App\Cart::totalItems()}}
       </span>
      </button>
      </a>
      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{route('login')}}">Login</a>
      </li>
        @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>
          @endif
      @else
          <div class="dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             @if(!is_null(Auth::user()->photo))
              <img src="{{asset('images/users/' .Auth::user()->photo)}}" class="img rounded-circle" style="width:30px" alt="">  {{ Auth::user()->username }} <span class="caret"></span>
             @else
             <img src="images/defaults/male.png" class="img rounded-circle" style="width:30px" alt="">  {{ Auth::user()->username }} <span class="caret"></span>
             @endif
            </a>
            <ul class="dropdown-menu">
              <li>
               <div class="dropdown-menu-right" >

                 <a class="dropdown-item" href="{{route('dashboard')}}"> My Dashboard </a>
               </div>
             </li>
              <li>
                <div class="dropdown-menu-right" >
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </li>
            </ul>
         </div>
      @endguest
  </ul>

</div>
</div>
</nav>
<!--end of navbar-->
