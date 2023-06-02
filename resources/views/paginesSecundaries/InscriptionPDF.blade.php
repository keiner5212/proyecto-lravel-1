<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="padding-top: 5%;padding-bottom: 5%; font-size: 13px">
        <div class="card">
            <div class="card-header" style="font-weight: bold;">RECIBO DE INSCRIPCION</div>
            <p class="text-center" style="padding-top: 5%"><img class="rounded"
                    src="{{ public_path('images/races_images/' . $race->promoteInfo) }}" width="150px">
            </p>
            <div style="padding-right: 11%;padding-left: 7%">
                <div class="row mb-3">
                    <label style="font-weight: bold;">Carrera: </label>
                    <label style="font-size: 13px" class="form-control" type="text">{{ $race->name }}</label>
                </div>
                <div class="row mb-3">
                    <label style="font-weight: bold;">Aseguradora: </label>
                    <label style="font-size: 13px" class="form-control" type="text">{{ $insurer->name }}</label>
                </div>
                <div class="row mb-3">
                    <label style="font-weight: bold;">CIF aseguradora: </label>
                    <label style="font-size: 13px" class="form-control" type="text">{{ $insurer->cif }}</label>
                </div>
                <div class="row mb-3">
                    <label style="font-weight: bold;">Corredor: </label>
                    <label style="font-size: 13px" class="form-control" type="text">{{ $user->name }}</label>
                </div>
                <div class="row mb-3">
                    <label style="font-weight: bold;">DNI corredor: </label>
                    <label style="font-size: 13px" class="form-control" type="text">{{ $user->dni }}</label>
                </div>
                <div class="row mb-3">
                    <label style="font-weight: bold;">E-mail corredor: </label>
                    <label style="font-size: 13px" class="form-control" type="text">{{ $user->email }}</label>
                </div>
                <div class="table-responsive">
                    </label>
                    <table class="table">
                        <tr>
                            <th style="background-color: rgb(212, 245, 162)">
                                Concepto: </th>
                            <th style="background-color: rgb(212, 245, 162)">
                                Precio: </th>
                        </tr>
                        <tr>
                            <td>Inscripcion a carrera</td>
                            <td>{{ $insurer->tax }}</td>
                        </tr>
                        <tr>
                            <td>
                                Total</td>
                            <td style="background-color: rgb(245, 233, 162)">
                                {{ $insurer->tax }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
