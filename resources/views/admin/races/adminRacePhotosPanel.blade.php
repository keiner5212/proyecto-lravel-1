@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row" style="margin-top: 2%">
            @if (sizeof($photos) == 0)
                <div class="alert alert-danger">
                    No hay fotos que mostrar
                </div>
            @else
                    @foreach ($photos as $item)
                        <div class="col-lg-4" style="padding: 25px">
                            <img width="270px" class="rounded" src="../images/races_images/Race_img_indv/{{$item->route}}" alt={{$item->altText}}>
                        </div>
                    @endforeach
            @endif
        </div>
    </div>
@endsection()
@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
@endsection
