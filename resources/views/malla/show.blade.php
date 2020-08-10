@extends('layouts.font')
@section('content')
    <div class="col-md-6 offset-md-3">
        <section class="card">
            <div class="twt-feed bg-dark">
                <div class="row close-card">
                    <a href="{{ url('mallas/') }}" class="btn btn-border-none color-white">
                        <i class="ti-close"></i>
                    </a>
                </div>
                <div class="fa fa-gg wtt-mark"></div>

                <div>
                    <a href="" data-toggle="modal" data-target="#mediumModal" class="float-left">
                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{ $malla->fotoMalla }}">
                    </a>
                    <div>
                        <h3 class="text-white display-5">{{ 'Malla '.$malla->tipoMalla }}</h3>
                        <p class="text-light">{{ $malla->descripcion }}</p>
                    </div>
                </div>
            </div>
            <div class="weather-category twt-category">
                <ul>
                    <li class="active">
                        <h4><strong>{{ $malla->celda.' cm.' }}</strong></h4>
                        Celda
                    </li>
                    <li>
                        <h4><strong>{{ $malla->alambre }}</strong></h4>
                        Alambre
                    </li>
                    @if($malla->tipoMalla == 'olimpica')
                    <li>
                        <h4><strong>{{ $malla->precio.' Bs.' }}</strong></h4>
                        Precio [m2]
                    </li>
                    @else
                    <li>
                        <h4><strong>{{ $malla->precio.' Bs.' }}</strong></h4>
                        Precio 
                    </li>
                    @endif
                </ul>
                @if($malla->tipoMalla != 'olimpica')
                <ul>
                    <li></li>
                    <li>
                        <h4><strong>{{ $malla->alto.'x'.$malla->largo.' mts'}}</strong></h4>
                        Dimensión
                    </li>
                    <li></li>
                </ul>
                @endif
            </div>
        </section>
    </div>
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">

                <div class="modal-body">
                    <img class="align-self-center mr-3" style="width:460px; height:460px;" alt="" src="{{ $malla->fotoMalla }}">
                </div>
            </div>
        </div>
    </div>

@endsection
