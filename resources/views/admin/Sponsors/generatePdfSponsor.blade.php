@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Seleccionar carreras</div>
                    <div class="card-body">
                        @if ($sponsor == 'x')
                            <div class="alert alert-danger">
                                Ocurrio un error
                            </div>
                        @else
                            <form action='/generatePDF/{{ $sponsor->id }}' method="POST" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row justify-content-center">
                                    <div class="row mb-3">
                                        <label for="exampleInputEmail1">Selecciona todas las carreras que se van a
                                            patrocinar (presiona Ctrl para seleccionar varias)</label>
                                        @if (sizeof($races) == 0)
                                            <div class="alert alert-danger">
                                                No hay carreras que mostrar
                                            </div>
                                        @else
                                            <select name="races[]" size="10" multiple>
                                                @foreach ($races as $item)
                                                    <option
                                                        value="{{ $item->id . '/' . $item->name . '/' . $item->promoteTax }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
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
    </div>

@endsection
