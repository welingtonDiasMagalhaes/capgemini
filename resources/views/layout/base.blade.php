<!DOCTYPE html>
<html lang="pt-br">
   <head>
       <meta charset="utf-8"/>
       <title>@yield('titulo')</title>

       <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"  type="text/javascript"></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
   </head>
   <body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="load"> <i class="fa fa-cog fa-spin fa-5x fa-fw"></i><span class="sr-only">Loading...</span> </div>
    
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <h3 id="titulo_navbar">Banco Capgemini</h3>
    </nav>

    <div class="container-fluid content">
      @yield('content')
    </div>


   </body>
</html>