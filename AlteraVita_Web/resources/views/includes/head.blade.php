<meta charset="utf-8">
    <title>AlteraVita - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Donnez une nouvelle vie à vos appareils, acheter un ordinateur, smartphone
    , tablette, etc… d’occassion avec AlteraVita ! Voici la page d'accueil, c'est ici que vous pourrez voir les dernières annonces etc..">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/layout.js') }}" defer></script>      
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f3e9581cdb.js" crossorigin="anonymous"></script>  
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- Style personnalisé -->
    <link href="@yield('style')" rel="stylesheet"> 
    