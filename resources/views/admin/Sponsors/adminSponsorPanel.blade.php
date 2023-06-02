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
        <a class="menu-button" href='/showSponsorsForm' role="button">Añadir sponsor</a>
        <div class="table-responsive" style="margin-top: 2%; padding-left: 2%; padding-right: 2%">
            @if (sizeof($sponsors) == 0)
                <div class="alert alert-danger">
                    No hay sponsors que mostrar
                </div>
            @else
                <table class="table" style="margin-top: 3%">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>CIF</th>
                        <th>Icon</th>
                        <th>Dirección</th>
                        <th>Pagina principal</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($sponsors as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->cif }}</td>
                            <td><img class="rounded" width="60" src="images\sponsor_icon\{{ $item->icon }}" /></td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->principal_page }}</td>
                            <td>
                                <a href="{{ route('showSponsorsEditForm', $item->id) }}" style="padding-right: 10px">
                                    <img class="rounded" src="images\favicon\edit.png" width="20" alt="editar"
                                        title="Editar">
                                </a>
                                <a href="{{ route('showSponsorsPDFForm', $item->id) }}">
                                    <img class="rounded" src="images\favicon\dowloadPdf.png" width="20"
                                        alt="Descargar PDF" title="Descargar PDF">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection()
