@extends('layouts.font')
@section('content')
    <div class="col-md-6 offset-md-3">
        <section class="card">
            <div class="twt-feed bg-dark">
                <div class=" row close-card">
                    <a href="{{ url('alambres/') }}" class="btn btn-border-none color-white">
                        <i class="ti-close"></i>
                    </a>
                </div>
                <div class="fa fa-stumbleupon wtt-mark"></div>

                <div>
                    <a href="" data-toggle="modal" data-target="#mediumModal" class="float-left">
                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{ $alambre->fotoAlambre }}">
                    </a>
                    <div>
                        <h3 class="text-white display-6">{{ 'Alambre '.$alambre->tipoAlambre }}</h3>
                        <p class="text-light">{{ $alambre->descripcion }}</p>
                    </div>
                </div>
            </div>
            <div class="weather-category twt-category">
                <ul>
                    <li class="active">
                        <h4><strong>{{ $alambre->awg }}</strong></h4>
                        Numero
                    </li>
                    <li>
                        <h4><strong>{{ $alambre->peso }}</strong></h4>
                        Peso [Kg]
                    </li>
                    <li>
                        <h4><strong>{{ $alambre->precio }}</strong></h4>
                        Precio [m2]
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">

                <div class="modal-body">
                    <img class="align-self-center mr-3" style="width:460px; height:460px;" alt="" src="{{ $alambre->fotoAlambre }}">
                </div>
            </div>
        </div>
    </div>
@endsection
