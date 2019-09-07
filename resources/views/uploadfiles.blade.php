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
    <!-- Load required Bootstrap and BootstrapVue CSS -->
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
</head>
<body>
    <nav class="navbar navbar-expand" style="background: #008aa2;">

            <a class="navbar-brand" href="#"><img class="mr-3" src="logo_uth.png" alt="" width="48" height="48"></a>
           
            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
                <a class="nav-link text-white" href="#">DESAWEB.DAVIS</a>
            </div>
        
            <div class="my-2 my-lg-0">
                <a class="my-2 my-sm-0"><img class="mr-3" src="vuet.jpg" alt="" width="48" height="48"></a>
            </div>
        
    </nav>
    
    <div id="app">
        <br>
        <form-upload-component>
        </form-upload-component>
    </div>
    <nav class="navbar fixed-bottom navbar-expand "  style="background: #008aa2;">
           
    </nav>

</body>
</html>
