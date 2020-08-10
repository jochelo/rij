@extends('layouts.font')
@section('content')

@if(isset($dat))
    <div id="vacio" class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Alerta!</strong> No existen productos registrados.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <a href="{{ url('/inicio') }}" class="btn btn-border-none">
                    <i class="ti-close"></i>
                </a>
                <div class="mx-auto d-block">
                    <!--<img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap">-->
                    <h2 class="text-sm-center mt-2 mb-1">CLIENTE: {{ $cliente->nombres.' '.$cliente->apellidos }}</h2>
                    <hr>
                    <form action="{{ route('pedidos.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="fecha" class=" form-control-label">Fecha Pedido</label></div>
                            <div class="col-12 col-md-9">
                                <input type="date" id="fecha" name="fecha" placeholder="Fecha" class="form-control @error('fecha') is-invalid @enderror"/>
                                @error('fecha')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti-arrow-circle-right"></i> Continuar
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('head')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script>
    window.setTimeout(function () {
       $('#vacio').fadeTo(2500,0).slideUp(500,function () {
           $(this).remove();
       });
    },2000);
    </script>

@endsection
