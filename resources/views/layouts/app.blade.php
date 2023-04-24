<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
<body class="bg-light">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav me-auto">
                        <a href="{{ URL::to('/home')}}">
                            <button type="button" class="btn btn-outline-warning">Main</button>
                        </a>
                    </ul>

                    <ul class="navbar-nav me-auto">
                        <a href="{{ URL::to('/places')}}">
                            <button type="button" class="btn btn-outline-warning">Places</button>
                        </a>
                    </ul>

                    <ul class="navbar-nav me-auto">
                        <a href="{{ URL::to('/profile')}}">
                            <button type="button" class="btn btn-outline-warning">Profile</button>
                        </a>
                    </ul>

                    <ul class="navbar-nav me-auto">
                        <a href="{{ URL::to('/events')}}">
                            <button type="button" class="btn btn-outline-warning">Events</button>
                        </a>
                    </ul>

                    <ul class="navbar-nav me-auto">
                        <a href="{{ URL::to('/create_event')}}">
                            <button type="button" class="btn btn-outline-warning">Create Event</button>
                        </a>
                    </ul>

                    <ul class="navbar-nav me-auto">
                        <a href="{{ URL::to('/memories')}}">
                            <button type="button" class="btn btn-outline-warning">Memories</button>
                        </a>
                    </ul>


                   
                </div>
            </div>
        </nav>

            @include('flash-message')
            @yield('content')
            

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
