<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Daweb</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-lg navbar-light" style="background: #008aa2;">

    <a class="navbar-brand" href="#"><img class="mr-3" src="logo_uth.png" alt="" width="48" height="48"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link text-white" href="#">DESAWEB CASTILLO</a>
        </li>
      </ul>
    </div>

    <div class="my-2 my-lg-0">
      <a class="my-2 my-sm-0"><img class="mr-3" src="vuet.jpg" alt="" width="48" height="48"></a>
    </div>

  </nav>

  
  

        <main class="py-4">
            @yield('content')
        </main>

        <nav class="navbar navbar-expand "  style="background: #008aa2;">
            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
                <img style="border-radius: 50%;"width="100" height="80" src="img/perfil_fede.png">  <label class="text-center" >By Federico Castillo Valenzuela <a href="http://www.deapw.xyz" style="color:white">Unidad 1 DEAPW</a></label>
            </div> 
        </nav>
    </div>


</body>
</html>
