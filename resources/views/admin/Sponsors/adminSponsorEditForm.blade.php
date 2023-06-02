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
                    <div class="card-header">Editar Sponsor</div>
                    <div class="card-body">
                        @if ($sponsor == 'x')
                            <div class="alert alert-danger">
                                Ocurrio un error
                            </div>
                        @else
                            <form action='/saveSponsorsEditForm/{{ $sponsor->id }}' method="POST" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row justify-content-center">
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Nombre</label>
                                        <input class="form-control" type="text" name="name"
                                            value='{{ $sponsor->name }}' />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">CIF</label>
                                        <input class="form-control" type="text" name="cif"
                                            value='{{ $sponsor->cif }}' />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Icono</label>
                                        <img class="rounded" src="..\images\sponsor_icon\{{ $sponsor->icon }}"
                                            style="width: 100px" />
                                        <input class="form-control" type="file" accept="image/*" name="icon" />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Correo</label>
                                        <input class="form-control" type="text" name="address"
                                            value='{{ $sponsor->address }}' />
                                    </div>
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Pagina principal</label>
                                        <select class="form-control" name="principal_page">
                                            <option value="si">SI</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </div>
                                    <button class="menu-button" type="submit">
                                        guardar
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</div @endsection()
