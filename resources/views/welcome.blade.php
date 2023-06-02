@extends('layouts.app')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
@section('content')

    <body class="antialiased">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <a href='/' role="button"><img class="navbar-brand" src="images/favicon/logoPrincipal.svg" height="100px"
                        width="100px" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Classificacions generals</a>
                        </li>
                    </ul>

                    <form class="d-flex" action="{{ url('/') }}">
                        {{ method_field('PUT') }}
                        <input class="form-control me-2" name="search" type="text" placeholder="Search">
                        <button class="btn btn-primary customButtonLogin" type="submit">Search</button>
                    </form>

                    @if (Route::has('login'))
                        <div class="d-flex">
                            @auth
                                <a href="{{ url('/home') }}" class="btn btn-primary customButtonLogin">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary customButtonLogin">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary customButtonLogin">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif

                </div>
            </div>
        </nav>
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/banner/banner1.jpg" alt="Los Angeles" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="images/banner/banner4.png" alt="Chicago" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="images/banner/banner3.jpg" alt="Chicago" class="d-block w-100">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <div class="container mt-6">
            <h2 class="cursesFinalitzadesTitle">Curses finalitzades:</h2>
            <div class="row">
                @foreach ($finishedRaces as $item)
                    <div class="col-sm-6"
                        style="border-radius: 10px  ;background-image: url(images/races_images/{{ $item->promoteInfo }}); background-size: cover;min-width: 330px">
                        <div class="d-flex flex-nowrap bd-highlight">
                            <div class="order-3 p-2 bd-highlight"
                                style="color: white; font-size: 38px; font-weight: bolder; margin: 10px;">
                                {{ $item->name }}</div>
                        </div>
                        <div class="d-flex flex-nowrap bd-highlight" style="justify-content: space-around; margin-right: 45%;margin-top: 140px;">
                            <a class="btn btn-primary customButtonLogin" href="{{ route('showScoresOfRace', $item->id) }}"
                                style="font-weight: bolder;">Resultats</a>
                            <a class="btn btn-primary customButtonLogin" href="{{ route('showPhotos', $item->id) }}"
                                style="font-weight: bolder;">Ver Fotos</a>
                        </div>
                        <div class="d-flex bd-highlight mb-3"
                            style=" background-color: #212529; font-weight: bolder; margin-top: 20px !important; margin-bottom: 0px !important; padding: 10px;">
                            <div class="p-2 bd-highlight" style="color:#FFCD00;">Data: {{ $item->date }}</div>
                            <div class="p-2 bd-highlight" style="color:#FFCD00;">Hora: {{ $item->dateTime }}</div>
                            <div class="ms-auto p-2 bd-highlight" style="color: white;">Distancia: {{ $item->km }} KM
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container mt-6">
            <h2 class="cursesFinalitzadesTitle">Proximes inscripcions:</h2>
            <div class="row">
                @foreach ($futureRaces as $item)
                    <div class="col-sm-6"
                        style="background-image: url(images/races_images/{{ $item->promoteInfo }}); background-size: cover;">
                        <div class="d-flex flex-nowrap bd-highlight">
                            <div class="order-3 p-2 bd-highlight"
                                style="color: white; font-size: 38px; font-weight: bolder; margin: 10px;">
                                {{ $item->name }}</div>
                        </div>
                        <div class="d-flex flex-nowrap bd-highlight">
                            <a href="{{ route('infoRace', $item->id) }}" class="order-3 p-2 bd-highlight"
                                style="color: white; font-size: 20px; font-weight: bolder; margin: 10px;">Més
                                informació</a>
                        </div>
                        <div class="d-flex bd-highlight mb-3"
                            style=" background-color: #212529; font-weight: bolder; margin-top: 73px !important; margin-bottom: 0px !important; padding: 10px;">
                            <div class="p-2 bd-highlight" style="color:#FFCD00;">Data: {{ $item->date }}</div>
                            <div class="p-2 bd-highlight" style="color:#FFCD00;">Hora: {{ $item->dateTime }}</div>
                            <div class="ms-auto p-2 bd-highlight" style="color: white;">Distancia: {{ $item->km }} KM
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Grid container -->
        <footer class="text-center text-white"
            style="background-color: #212529; padding-top: 30px !important; margin-top: 120px !important;">
            <div class="row d-flex justify-content-between"
                style="witdh: 100%!important; margin-left: 250px; margin-right: 250px;">
                @foreach ($sponsors as $item)
                    <div class="col-lg-2 col-md-12 mb-4 mb-md-0" style="padding: 5px">
                        <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                            <img src="..\images\sponsor_icon\{{ $item->icon }}" class="w-100"
                                style="width: 200px; height: 150px; margin-bottom: 25px;" />
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <br class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2); height: 100% !important;">
            <p style="padding: 15px; margin: 0px !important; color: #FFCD00 !important;">© 2023 Copyright:</p>
            <p style="padding: 15px; margin: 0px !important; color: #FFCD00 !important;">Bikeroll</p>
            <a href="{{ route('login') }}" style="text-decoration: none; color: white;">
                <p style="padding: 15px 15px 50px 15px; margin: 0px !important; color: #FFCD00 !important;">Administradors
                </p>
            </a>
            </div>
            <!-- Copyright -->
        </footer>
    @endsection
