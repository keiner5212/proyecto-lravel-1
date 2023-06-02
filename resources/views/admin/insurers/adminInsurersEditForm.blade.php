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
                    <div class="card-header">Editar aseguradora</div>
                    <div class="card-body">
                        @if ($insurer == 'x')
                            <div class="alert alert-danger">
                                Ocurrio un error
                            </div>
                        @else
                            <form action='/adminSaveEditInsurerForm/{{ $insurer->id }}' method="POST" role="form">
                                @csrf
                                @method('PUT')
                                <div class="row justify-content-center">
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Nombre</label>
                                        <input class="form-control" type="text" name="name"
                                            value='{{ $insurer->name }}' />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">CIF</label>
                                        <input class="form-control" type="text" name="cif"
                                            value='{{ $insurer->cif }}' />
                                    </div>

                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Dirección</label>
                                        <input class="form-control" type="text" name="address"
                                            value='{{ $insurer->address }}' />
                                    </div>

                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Precio</label>
                                        <input class="form-control" type="number" name="tax" step="any" value='{{ $insurer->tax }}' />
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
