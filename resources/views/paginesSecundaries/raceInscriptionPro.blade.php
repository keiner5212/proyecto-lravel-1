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
            <a href='/' role="button" class="mr-auto p-2"><img class="navbar-brand" src="../../images/favicon/logoPrincipal.svg" height="100px" width="100px"/></a>
            <div class="p-2" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item" style="margin-left: 25px;">
                        <a class="nav-link" href="{{ route('showPreInscription', $race['id']) }}">Tornar enrere ...</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-6">
        <h1 class="raceTitle">Formulari d'inscripció:<br>{{$race['name']}}</h1>
        <form action="{{ route('inscriptionValidateFormPro', $race['id']) }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="federated" class="col-sm-2 col-form-label">Numero de federat</label>
                <div class="col-sm-10 pt-3">
                    <input type="text" class="form-control" name="federated" id="federated" value="0" pattern="[0-9]+">
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="name" class="col-sm-2 col-form-label">Nom del corredor</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" pattern="[a-zA-Z ]{2,254}">
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="dni" class="col-sm-2 col-form-label">DNI</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="dni"  id="dni" pattern="[0-9]{8}[A-Za-z]{1}">
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="birth" class="col-sm-2 col-form-label">Data de naixement</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="birth"  id="birth">
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Enviar</button>
        </form>
    </div>

    <!-- Grid container -->
    <footer class="text-center text-white" style="background-color: #212529; padding-top: 30px !important; margin-top: 120px !important;">
        <div class="row d-flex justify-content-between" style="witdh: 100%!important; margin-left: 250px; margin-right: 250px;">
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
        <p style="padding: 15px; margin: 0px !important; color: #FFCD00 !important;">© 2023 Copyright:</p>
        <p style="padding: 15px; margin: 0px !important; color: #FFCD00 !important;">Bikeroll</p>
        <a href="{{ route('login') }}" style="text-decoration: none; color: white;"><p style="padding: 15px 15px 50px 15px; margin: 0px !important; color: #FFCD00 !important;">Administradors</p></a>
        </div>
        <!-- Copyright -->
    </footer>
@endsection
