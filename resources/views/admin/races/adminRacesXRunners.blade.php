@extends('layouts.app')
@section("content")
    <div class="container">
        <div class="table-responsive" style="margin-top: 2%">
            <p class="h1">{{$race->name}}</p>
            @if (sizeof($runners) == 0)
                <div class="alert alert-danger">
                    No hay corredores apuntados en esta carrera
                </div>
            @else
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Id corredor</th>
                    <th>Tiempo</th>
                    <th>QR</th>
                    <th>Numero de federado</th>
                    <th>Pagado/No pagado</th>
                </tr>
                @foreach($runners as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->pivot->time}}</td>
                    <td>{{$item->pivot->qr}}</td>
                    <td>{{$item->pivot->bibNumber}}</td>
                    @if ($item->pivot->ifPay == 1)
                        <td>Pagado</td>
                    @else
                        <td>No pagado</td>
                    @endif
                </tr>
                @endforeach
            </table>
            @endif
        </div>
    </div>
@endsection()
