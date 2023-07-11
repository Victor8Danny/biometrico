<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

    <title>Sistema de control de asistensias</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
   @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color:#BDC3C7;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm" style="background-color:#278747;">
            <div class="container" >
                <a class="navbar-brand text-light" href="{{ url('/') }}" style="background-color:#278747;">
                Sistema de control de sssasistensias
                </a>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right" >
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" style="color:#FF0000;">Home</a>
                    @else
                        

                    @endauth
                </div>
            
                    </ul>
                </div>
            </div>
        </nav>

        
</div>
</body>

</html>

