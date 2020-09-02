<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Chef @yield('title') </title>

    <!-- Scripts -->
    <script src={{url('bst/js/jquery.js')}}></script>
    <script src={{asset('bst/js/popper.js')}}></script>
    <script src={{URL::to('bst/js/bootstrap.js')}}></script>

    <script>

      $(function(){
        setTimeout(function(){
          $(".alert").fadeOut();
        }, 4000)
      })

    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{URL::to('bst/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::to('fa/css/all.css')}}">
</head>
<body>
    <div id="app">
       @include("partials.nav");

        <main class="container-fluid small">


          <div class="row">

            <div class="col-sm-2">

              @auth

              @include("partials.sidebar")
                  
              
              @endauth
              

            </div>
            <div class="col-sm-10">

                @yield('content')

            </div>
                  
          </div>



          
        </main>
    </div>
</body>
</html>

@yield('javascript')