@extends('layouts.app')
@section('content')
<div class="container">
    <a class="btn btn-primary" href="/adminShowInsurerForm" role="button">Añadir aseguradora</a>
    <div class="table-responsive" style="margin-top: 2%">
        @if (sizeof($insurers) == 0)
        <div class="alert alert-danger">
            No hay aseguradoras que mostrar
        </div>
        @else
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>CIF</th>
                <th>Dirección</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            @foreach ($insurers as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->cif}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->tax}}</td>
                <td>{{$item->active}}</td>
                <td>
                    <a href="{{route('adminShowEditInsurerForm', $item->id)}}" style="padding-right: 10px">
                        <img class="rounded" src="images\favicon\edit.png" width="20" alt="editar" title="Editar">
                    </a>
                    @if ($item->active == 1)
                    <a href="{{route('setOffInsurer', $item->id)}}">
                        <img class="rounded" src="images\favicon\disable.png" width="25" alt="Desactivar"
                            title="Desactivar"></a>
                    @else
                    <a href="{{route('setOnInsurer', $item->id)}}">
                        <img class="rounded" src="images\favicon\enable.png" width="25" alt="Activar"
                            title="Activar"></a>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
</div>

@endsection