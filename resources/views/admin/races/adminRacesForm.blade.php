@extends('layouts.app')

@section('content')
    <div class="container">
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
                                <button class="btn btn-primary" type="submit">
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
