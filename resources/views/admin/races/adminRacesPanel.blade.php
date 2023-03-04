@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-primary" href='/adminShowRaceForm' role="button">Añadir carreras</a>
        <div class="table-responsive" style="margin-top: 2%">
            @if (sizeof($races) == 0)
                <div class="alert alert-danger">
                    No hay carreras que mostrar
                </div>
            @else
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Desnivel</th>
                        <th>Mapa</th>
                        <th>Max participantes</th>
                        <th>Km</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Punto de salida</th>
                        <th>Cartel promo</th>
                        <th>Coste promo</th>
                        <th>Activo</th>
                        <th>Corredores</th>
                        <th>Fotos relaciondas</th>
                        <th>Añadir foto</th>
                        <th>Editar</th>
                        <th>Activar/Desactivar</th>
                    </tr>
                    @foreach ($races as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->unveness }}</td>
                            <td>
                                <iframe src={{ $item->map }} width="110" height="110" style="border: 0"
                                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </td>
                            <td>{{ $item->maxParticipants }}</td>
                            <td>{{ $item->km }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->dateTime }}</td>
                            <td>{{ $item->startPoint }}</td>
                            <td><img class="rounded" width="100" src="images\races_images\{{ $item->promoteInfo }}" />
                            </td>
                            <td>${{ $item->promoteTax }}</td>
                            <td>{{ $item->active }}</td>
                            <td><a href="{{ route('adminShowRunnersXRace', $item->id) }}">Ver listado</a></td>
                            <td><a href="{{ route('adminShowRacePhotos', $item->id) }}">Ver fotos</a></td>
                            <td><a href="{{ route('adminRacesAddPhoto', $item->id) }}" style="padding-right: 10px">
                                    <img class="rounded" src="images\favicon\foto_add.svg" width="20" alt="add_foto"
                                        title="Añadir foto"></a>
                            <td><a href="{{ route('adminShowEditRaceForm', $item->id) }}" style="padding-right: 10px">
                                    <img class="rounded" src="images\favicon\edit.png" width="20" alt="editar"
                                        title="Editar"></a>
                            </td>
                            <td>
                                @if ($item->active == 1)
                                    <a href="{{ route('setOffRace', $item->id) }}">
                                        <img class="rounded" src="images\favicon\disable.png" width="25"
                                            alt="Desactivar" title="Desactivar"></a></a>
                                @else
                                    <a href="{{ route('setOnRace', $item->id) }}">
                                        <img class="rounded" src="images\favicon\enable.png" width="25" alt="Activar"
                                            title="Activar"></a></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection()
{{-- ejecutar este cdigo para reflejar los cambios (por si no se muestran)
php artisan route:cache
php artisan view:cache
php artisan config:clear
php artisan cache:clear
php artisan optimize
    --}}
