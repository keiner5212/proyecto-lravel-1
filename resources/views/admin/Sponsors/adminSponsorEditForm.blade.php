@extends('layouts.app')
@section('content')
    <div class="container">
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
                                    <button class="btn btn-primary" type="submit">
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
