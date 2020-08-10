<div class="col-md-6 offset-md-3">
    <aside class="profile-nav alt">
        <section class="card">
            <div class="twt-feed bg-success">
                <div class="row close-card">
                    <a href="{{ url('cotizadors/') }}" class="btn btn-border-none color-white">
                        <i class="ti-close"></i>
                    </a>
                </div>
                <div class="fa fa-gg wtt-mark"></div>

                <div>
                    <a href="" data-toggle="modal" data-target="#mediumModal" class="float-left">
                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{ $malla->fotoMalla }}">
                    </a>
                    <div>
                        <h2 class="text-white display-6">{{ 'Malla '.$malla->tipoMalla }}</h2>
                        <br>
                        <p class="text-light sz-sm text-white"><i class="fa fa-user"></i>{{ ' '.$cliente->nombres.' '.$cliente->apellidos }}</p>
                    </div>
                </div>
            </div>
            <ul class="list-group list-group-flush text-muted">
                <li class="list-group-item">
                    <i class="fa fa-chain"></i> Celda: <strong>{{ $malla->celda }}</strong> cm.
                </li>
                <li class="list-group-item">
                    <i class="fa fa-dot-circle-o"></i>  Alambre: <strong>{{ $malla->alambre }}</strong>
                </li>
{{-- dimension --}}
                @if($malla->tipoMalla=='olimpica')
                <li class="list-group-item">
                    <i class="ti-ruler-alt"></i> Dimensión: <strong>{{ $datos['alto'].' x '.$datos['largo'] }}</strong> mts.
                </li>
                @else
                <li class="list-group-item">
                    <i class="ti-ruler-alt"></i> Dimensión: <strong>{{ $malla['alto'].' x '.$malla['largo'] }}</strong> mts.
                </li>
                @endif

                <li class="list-group-item">
                    <i class="fa fa-arrows-alt"></i> Metros Cuadrados: <strong>{{ $datos['mcuadrados'] }}</strong> m2
                </li>
                <li class="list-group-item">
                    <i class="fa fa-slack"></i> Cantidad: <strong>{{ $datos['cantidad'] }}</strong> [u]
                </li>

            </ul>
            <div class="weather-category twt-category">
                <ul>
                    <li>
                        <h4><strong>{{ $datos['precioUnit']/$datos['mcuadrados'] }}</strong></h4>
                        <i class="fa fa-bitcoin"></i> Precio por M2
                    </li>
                    <li class="text-success">
                        <h4><strong>{{ $datos['precioUnit'] }}</strong></h4>
                        <i class="fa fa-bitcoin"></i> Precio Unitario
                    </li>
                    <li class="text-primary">
                        <h3><strong>{{ $datos['precioTotal'] }}</strong></h3>
                        <i class="fa fa-bitcoin"></i> TOTAL
                    </li>
                </ul>
                <ul>
                    <li>

                    </li>
                    <li>
                        <form action="{{ route('cMalla') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="cotizador_id" value="{{$cotizacion->id}}">
                            <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
                            <input type="hidden" name="malla_id" value="{{$malla->id}}">
                            
                        @if(isset($malla->largo) && isset($malla->alto))
                            <input type="hidden" name="alto" value="{{$malla['alto']}}">
                            <input type="hidden" name="largo" value="{{$malla['largo']}}">
                        @else
                            <input type="hidden" name="alto" value="{{$datos['alto']}}">
                            <input type="hidden" name="largo" value="{{$datos['largo']}}">
                        @endif
                            <input type="hidden" name="mcuadrados" value="{{$datos['mcuadrados']}}">
                            <input type="hidden" name="cantidad" value="{{$datos['cantidad']}}">
                            <input type="hidden" name="precioUnit" value="{{$datos['precioUnit']}}">
                            <input type="hidden" name="precioTotal" value="{{$datos['precioTotal']}}">
                            <button type="submit" class="btn btn-border-none btn-outline-danger">
                                <i class="fa fa-print fa-2x"></i>
                            </button>
                        </form>
                    </li>
                    <li>
                    </li>
                </ul>
            </div>
        </section>
    </aside>
</div>
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">

            <div class="modal-body">
                <img class="align-self-center mr-3" style="width:460px;" alt="" src="{{ $malla->fotoMalla }}">
            </div>
        </div>
    </div>
</div>