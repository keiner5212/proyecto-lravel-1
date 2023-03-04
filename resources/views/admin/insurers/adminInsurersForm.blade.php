@extends('layouts.app')

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nueva aseguradora</div>

                    <div class="card-body">
                        <form action='/adminSaveInsurerForm' method="POST" role="form">
                            {{csrf_field()}}
                            <div class="row justify-content-center">
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input class="form-text" type="text" name="name" />
                                </div>

                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">CIF</label>
                                    <input class="form-text" type="text" name="cif" />
                                </div>

                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Dirección</label>
                                    <input type="text" name="address" />
                                </div>

                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Precio</label>
                                    <input type="number" name="tax" step="any" />
                                </div>

                                <button class="btn btn-primary" type="submit">
                                    Añadir aseguradora
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
