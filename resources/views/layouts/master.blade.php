<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
    @yield('title', 'Laramerce | Laravel E-Commerce Project')
    </title>
    @include('partials.styles')

   </head>
  <body>

   <div class="wrapper">
     @include('partials.navbar')
     @include('partials.errormessage')
    <div class="app-root">
      @yield('content')

      @include('partials.footer')
    </div>
   </div>

    @include('partials.scripts')
    @yield('scripts')
  </body>
</html>
