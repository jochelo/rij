@extends('layouts.font')
@section('content')
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">

                    <a href="{{ url('reservas/') }}" class="btn btn-border-none float-right">
                        <i class="ti-close"></i>
                    </a>

                <div class="mx-auto d-block">
                    <!--<img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap">-->
                    <h2 class="text-sm-center mt-2 mb-1">{{ $reserva->nombre }}</h2>
                    
                    <hr>                    
                    
                    <div class="location text-sm-center color-gray"><i class="fa fa-info"></i> {{ $reserva->detalle }}</div>
                    @if($reserva->estado=='espera')
                    <div class="telephone text-sm-center color-danger text-danger"><i class="fa fa-bookmark"></i> {{ $reserva->estado }}</div>
                    @else
                    <div class="telephone text-sm-center color-gray text-success"><i class="fa fa-bookmark"></i> {{ $reserva->estado }}</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
