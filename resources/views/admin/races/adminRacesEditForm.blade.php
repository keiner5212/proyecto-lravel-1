@extends('layouts.app')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@push('styles')
    <link href="../css/admin.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
@section('content')
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a href='/' role="button"><img class="navbar-brand" src="../images/favicon/logoPrincipal.svg" height="100px"
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
                            <a href="{{ url('/closeAdmin') }}" class="btn btn-primary customButtonLogin">Tancar sessió</a>
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
    <div class="container" style="margin: 30px auto ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Carrera</div>
                    <div class="card-body">
                        @if ($race == 'x')
                            <div class="alert alert-danger">
                                Ocurrio un error
                            </div>
                        @else
                            <form action='/adminSaveEditRaceForm/{{ $race->id }}' method="POST" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row justify-content-center">
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Nombre</label>
                                        <input class="form-control" type="text" name="name"
                                            value='{{ $race->name }}' />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Descripcion</label>
                                        <input class="form-control" type="text" name="description"
                                            value='{{ $race->description }}' />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Desnivel</label>
                                        <input class="form-control" type="number" step=".10" name="unveness"
                                            value='{{ $race->unveness }}' />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Mapa</label>
                                        <input class="form-control" type="text" name="map"
                                            value='{{ $race->map }}' />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Max participantes</label>
                                        <input class="form-control" type="number" step=".10" name="maxParticipants"
                                            value='{{ $race->maxParticipants }}' />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Km</label>
                                        <input class="form-control" type="number" step=".10" name="km"
                                            value='{{ $race->km }}' />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Fecha</label>
                                        <input class="form-control" type="date" name="date"
                                            value='{{ $race->date }}' />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Hora</label>
                                        <input class="form-control" type="time" name="dateTime"
                                            value='{{ $race->dateTime }}' />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Punto de salida</label>
                                        <input class="form-control" type="text" name="startPoint"
                                            value='{{ $race->startPoint }}' />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Cartel promo</label>
                                        <img class="rounded" src="..\images\races_images\{{ $race->promoteInfo }}"
                                            style="width: 100px" />
                                        <input class="form-control" type="file" accept="image/*"
                                            name="promoteInfo" />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Coste promo</label>
                                        <input class="form-control" type="number" step=".10" name="promoteTax"
                                            value='{{ $race->promoteTax }}' />
                                    </div>
                                    <button class="menu-button" type="submit">
                                        Guardar cambios
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
