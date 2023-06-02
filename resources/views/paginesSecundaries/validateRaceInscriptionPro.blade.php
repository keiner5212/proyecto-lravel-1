@extends('layouts.app')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        function noItsFederated() {
            document.getElementById('federated').style.display = 'none';
        }
    </script>
    <script src="{{asset("../../js/validateForm.js")}}"></script>
@endpush
@section('content')
    <body class="antialiased">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid d-flex">
            <a href='/' role="button" class="mr-auto p-2"><img class="navbar-brand" src="../../../images/favicon/logoPrincipal.svg" height="100px" width="100px"/></a>
            <div class="p-2" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item" style="margin-left: 25px;">
                        <a class="nav-link" href="{{ route('infoRace', $race['id']) }}">Tornar enrere ...</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-6">
        <h1 class="raceTitle">Error d'inscripció:<br>{{$race['name']}}</h1>
        <h1 class="raceTitle" style="color: red;">{{$missatge}}</h1>
    </div>

    <!-- Grid container -->
    <footer class="text-center text-white" style="background-color: #212529; padding-top: 30px !important; margin-top: 120px !important;">
        <div class="row d-flex justify-content-between" style="witdh: 100%!important; margin-left: 250px; margin-right: 250px;">
            @foreach ($sponsors as $item)
                <div class="col-lg-2 col-md-12 mb-4 mb-md-0" style="padding: 5px">
                    <div class="bg-image hover-overlay ripple shadow-1-strong rounded"
                         data-ripple-color="light">
                        <img src="..\..\..\images\sponsor_icon\{{ $item->icon }}" class="w-100"
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
        <a href="{{ route('login') }}" style="text-decoration: none; color: white;"><p style="padding: 15px 15px 50px 15px; margin: 0px !important; color: #FFCD00 !important;">Administradors</p></a>
        </div>
        <!-- Copyright -->
    </footer>
@endsection
