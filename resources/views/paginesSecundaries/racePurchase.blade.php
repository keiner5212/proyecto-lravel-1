@extends('layouts.app')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script
        src="https://www.paypal.com/sdk/js?client-id=AdrW2oEJ55vohZFmcLugBmi8oWmHfMoK4G5tQmFq4zlP3hWYzIgj37HxcAOf7tm7iy15yHA8OmrHk0W6&currency=USD">
    </script>
    <script>
        paypal.Buttons({
            style: {
                size: 'small',
                color: 'gold',
                shape: 'pill',
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: {{ floatval($insurer->tax) }}
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                window.location.href = '{{ route('inscriptionPurchaseReceipt', [$race->id, $user->id]) }}';
                setTimeout(() => {
                    window.location.href = '/';
                }, 2000);
            },
            onCancel: function(data, actions) {
                alert("Cancelado");
            }
        }).render('#paypal-button');
    </script>
@endpush
@section('content')
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid d-flex">
            <a href='/' role="button" class="mr-auto p-2"><img class="navbar-brand"
                    src="..\..\..\..\images/favicon/logoPrincipal.svg" height="100px" width="100px" /></a>
            <div class="p-2" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item" style="margin-left: 25px;">
                        <a class="nav-link" href="{{ route('showPreInscription', $race['id']) }}">Tornar enrere ...</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container" style="margin: 30px auto ">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Pagar inscripcion</div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="row mb-3">
                                    <label>Carrera: </label>
                                    <input class="form-control" type="text" value='{{ $race->name }}' disabled />
                                </div>
                                <div class="row mb-3">
                                    <label>Aseguradora: </label>
                                    <input class="form-control" type="text" value='{{ $insurer->name }}' disabled />
                                </div>
                                <div class="row mb-3">
                                    <label>Precio a pagar: </label>
                                    <input class="form-control" type="text" value='${{ $insurer->tax }}' disabled />
                                </div>
                                <div class="row mb-3">
                                    <label>Corredor: </label>
                                    <input class="form-control" type="text" value='{{ $user->name }}' disabled />
                                </div>
                                <div id="paypal-button" style="display: flex; justify-content: center; width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-center text-white"
        style="background-color: #212529; padding-top: 30px !important; margin-top: 120px !important;">
        <div class="row d-flex justify-content-between"
            style="witdh: 100%!important; margin-left: 250px; margin-right: 250px;">
            @foreach ($sponsors as $item)
                <div class="col-lg-2 col-md-12 mb-4 mb-md-0" style="padding: 5px">
                    <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                        <img src="..\..\..\..\images\sponsor_icon\{{ $item->icon }}" class="w-100"
                            style="width: 200px; height: 150px; margin-bottom: 25px;" />
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <br class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2); height: 100% !important;">
        <p style="padding: 15px; margin: 0px !important; color: #FFCD00 !important;">© 2023 Copyright:</p>
        <p style="padding: 15px; margin: 0px !important; color: #FFCD00 !important;">Bikeroll</p>
        <a href="{{ route('login') }}" style="text-decoration: none; color: white;">
            <p style="padding: 15px 15px 50px 15px; margin: 0px !important; color: #FFCD00 !important;">Administradors
            </p>
        </a>
        </div>
        <!-- Copyright -->
    </footer>
@endsection
