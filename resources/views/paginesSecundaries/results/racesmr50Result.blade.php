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
            <a href='/' role="button"><img class="navbar-brand" src="../../images/favicon/logoPrincipal.svg" height="100px"
                                           width="100px" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Link</a>
                    </li>
                </ul>

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
    <main class="container mt-6">
        <h1 style="text-align: center;margin: 10px">{{$race["name"]}}</h1>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" style="color: black !important;" href="{{ route('showScoresOfRace', $race['id']) }}">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black !important;" href="{{ route('showMascScoresOfRace', $race['id']) }}">Masculí</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black !important;" href="{{ route('showFemScoresOfRace', $race['id']) }}">Femení</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black !important;" href="{{ route('showMR20ScoresOfRace', $race['id']) }}">MR20</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black !important;" href="{{ route('showMR30ScoresOfRace', $race['id']) }}">MR30</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black !important;" href="{{ route('showMR40ScoresOfRace', $race['id']) }}">MR40</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black !important;" href="{{ route('showMR50ScoresOfRace', $race['id']) }}">MR50</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black !important;" href="{{ route('showMR60ScoresOfRace', $race['id']) }}">MR60</a>
            </li>
        </ul>
        @if (sizeof($generalInscriptions) == 0)
        <div class="alert alert-danger">
            No hay resultados que mostrar
        </div>
        @else
        <div class="mx-auto" style="margin: 20px">
            <table class="table table-dark table-striped">
                <tr>
                    <th>Posición</th>
                    <th>Dorsal</th>
                    <th>Tiempo</th>

                </tr>
                @foreach ($generalInscriptions as $item)
                    @if($item->users->gen == 'fem')
                        <tr>
                            <td>{{ $item->users->name }}</td>
                            <td>{{ $item->dorsal }}</td>
                            <td>{{ $item->time }}</td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        @endif
    </main>
    <footer class="text-center text-white" style="background-color: #212529; padding-top: 30px;">
        <div class="row d-flex justify-content-between" style="witdh: 100%; margin-left: 250px; margin-right: 250px;">
            @foreach ($sponsors as $item)
                <div class="col-lg-2 col-md-12 mb-4 mb-md-0" style="padding: 5px">
                    <div class="bg-image hover-overlay ripple shadow-1-strong rounded"
                         data-ripple-color="light">
                        <img src="..\..\images\sponsor_icon\{{ $item->icon }}" class="w-100"
                             style="width: 200px; height: 150px; margin-bottom: 25px;" />
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <br class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2); height: 100% !important;">
        <p style="padding: 15px; margin: 0px !important; font-size: 20px; color: #FFCD00 !important;">© 2023 Copyright:</p>
        <p style="padding: 15px; margin: 0px !important; font-size: 20px; color: #FFCD00 !important;">Bikeroll</p>
        <a href="{{ route('login') }}" style="text-decoration: none; color: white;"><p style="padding: 15px 15px 50px 15px; margin: 0px !important; font-size: 20px; color: #FFCD00 !important;">Administradors</p></a>
        </div>
        <!-- Copyright -->
    </footer>
    @endsection
