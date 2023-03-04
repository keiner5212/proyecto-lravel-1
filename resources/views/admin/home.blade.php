@extends('layouts.app')
@section('content')
    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="{{ route('adminRacesPanel') }}">
            <button class="btn btn-primary" type="button">Gestión carreras</button>
        </a>
        <a href="{{ route('adminInsurersPanel') }}">
            <button class="btn btn-primary" type="button">Gestión aseguradoras</button>
        </a>
        <a href="{{ route('adminSponsorsPanel') }}">
            <button class="btn btn-primary" type="button">Gestión sponsors</button>
        </a>
    </div>
@endsection
