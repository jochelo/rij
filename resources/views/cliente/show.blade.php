@extends('layouts.font')
@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">

                    <a href="{{ url('clientes/') }}" class="btn btn-border-none float-right">
                        <i class="ti-close"></i>
                    </a>

                <div class="mx-auto d-block">
                    <!--<img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap">-->
                    <h2 class="text-sm-center mt-2 mb-1">{{ $cliente->nombres.' '.$cliente->apellidos }}</h2>
                    <hr>
                    <div class="location text-sm-center color-gray"><i class="fa fa-map-marker"></i> {{ $cliente->direccion }}</div>
                    <div class="telephone text-sm-center color-gray"><i class="fa fa-phone"></i> {{ $cliente->celular }}</div>
                    <div class="location text-sm-center color-gray"><i class="fa fa-info"></i> {{ $cliente->detalle }}</div>

                </div>
            </div>
        </div>
    </div>
@endsection
