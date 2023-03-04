@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nuevo sponsor</div>
                    <div class="card-body">
                        <form action='/adminSponsorsPanel' method="POST" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row justify-content-center">
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input class="form-control" type="text" name="name" />
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">CIF</label>
                                    <input class="form-control" type="text" name="cif" />
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Icono</label>
                                    <input class="form-control" type="file" accept="image/*" name="icon"
                                        required="required" />
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Correo</label>
                                    <input class="form-control" type="text" name="address" />
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputEmail1">Pagina principal</label>
                                    <select class="form-control" name="principal_page">
                                        <option value="si">SI</option>
                                        <option value="no">NO</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary" type="submit">
                                    Añadir sponsor
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
