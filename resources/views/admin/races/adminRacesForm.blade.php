@extends('layouts.app')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@push('styles')
    <link href="css/admin.css" rel="stylesheet">
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
                    <div class="card-header">Nueva carrera</div>
                    <div class="card-body">
                        <form action='/adminSaveRaceForm' method="POST" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row justify-content-center">
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input class="form-control" type="text" name="name" />
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Descripcion</label>
                                    <input class="form-control" type="text" name="description" /> {{-- nuevo-> cambiar la clase a "form-control" en todos los input --}}
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Desnivel</label>
                                    <input class="form-control" type="number" step=".01" name="unveness" />
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Mapa</label>
                                    <input class="form-control" type="text" name="map" />
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Max participantes</label>
                                    <input class="form-control" type="number" name="maxParticipants" />
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Km</label>
                                    <input class="form-control" type="number" name="km" />
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Fecha</label>
                                    <input class="form-control" type="date" name="date" />
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Hora</label>
                                    <input class="form-control" type="time" name="dateTime" />
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Punto de salida</label>
                                    <input class="form-control" type="text" name="startPoint" />
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Cartel promo</label>
                                    <input class="form-control" type="file" accept="image/*" name="promoteInfo"
                                        required="required" />
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Coste promo</label>
                                    <input class="form-control" type="number" step=".01" name="promoteTax" />
                                </div>
                                <button class="menu-button" type="submit">
                                    Añadir carrera
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection()
