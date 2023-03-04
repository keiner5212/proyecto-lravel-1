<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="padding-top: 5%;padding-bottom: 5%; font-size: 13px">
        <div class="card">
            <div class="card-header" style="font-weight: bold;">INFORMACION SPONSOR</div>
            <p class="text-center" style="padding-top: 5%"><img class="rounded"
                    src="{{ public_path('images/sponsor_icon/' . $sponsor->icon) }}" width="150px">
            </p>
            <div style="padding-right: 11%;padding-left: 7%">
                <div class="row mb-3">
                    <label for="exampleInputEmail1" style="font-weight: bold;">Nombre
                    </label>
                    <label style="font-size: 13px" class="form-control" type="text">{{ $sponsor->name }}</label>
                </div>
                <div class="row mb-3">
                    <label for="exampleInputEmail1" style="font-weight: bold;">CIF
                    </label>
                    <label style="font-size: 13px" class="form-control" type="text">{{ $sponsor->cif }}</label>
                </div>
                <div class="row mb-3">
                    <label for="exampleInputEmail1" style="font-weight: bold;">Correo
                    </label>
                    <label style="font-size: 13px" class="form-control" type="text">{{ $sponsor->address }}</label>
                </div>
                <div class="row mb-3">
                    <label for="exampleInputEmail1" style="font-weight: bold;">Pagina
                        principal </label>
                    @if ($sponsor->principal_page == "si")
                        <label style="font-size: 13px" class="form-control" type="text">SI</label>
                    @else
                        <label style="font-size: 13px" class="form-control" type="text">NO</label>
                    @endif
                </div>
                <div class="table-responsive">
                    <label for="exampleInputEmail1" style="font-weight: bold;">CARRERAS PATROCINADAS
                    </label>
                    <table class="table">
                        <tr>
                            <th style="background-color: rgb(212, 245, 162)">
                                Id</th>
                            <th style="background-color: rgb(212, 245, 162)">
                                Nombre</th>
                            <th style="background-color: rgb(212, 245, 162)">
                                Precio</th>
                        </tr>
                        @foreach ($races as $item)
                            <tr>
                                <td>
                                    {{ $item[0] }}</td>
                                <td>
                                    {{ $item[1] }}</td>
                                <td>
                                    {{ "$" . $item[2] }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td style="color: rgb(156, 146, 146)">
                                Costo pag. principal</td>
                            <td>
                            </td>
                            <td style="background-color: rgb(208, 255, 243);color: rgb(156, 146, 146)">
                                {{ "$" . $costo }}</td>
                        </tr>
                        <tr>
                            <td>
                                Total</td>
                            <td>
                            </td>
                            <td style="background-color: rgb(245, 233, 162)">
                                {{ "$" . $total }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
