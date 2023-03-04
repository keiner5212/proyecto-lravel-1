@extends('layouts.app')
@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar aseguradora</div>
                    <div class="card-body">
                        @if ($insurer == "x")
                            <div class="alert alert-danger">
                                Ocurrio un error
                            </div>
                        @else
                        <form action='/adminSaveEditInsurerForm/{{$insurer->id}}' method="POST" role="form">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center">
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input class="form-text" type="text" name="name"
                                           value='{{ $insurer->name}}' />
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">CIF</label>
                                    <input class="form-text" type="text" name="cif"
                                           value='{{ $insurer->cif }}'/>
                                </div>

                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Dirección</label>
                                    <input class="form-text"  type="text" name="address"
                                           value='{{ $insurer->address }}'/>
                                </div>

                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Precio</label>
                                    <input type="number" name="tax" step="any" value='{{ $insurer->tax }}'/>
                                </div>

                                <button class="btn btn-primary" type="submit">
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
