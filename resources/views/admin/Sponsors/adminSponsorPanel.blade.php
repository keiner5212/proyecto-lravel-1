@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-primary" href='/showSponsorsForm' role="button">Añadir sponsor</a>
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
