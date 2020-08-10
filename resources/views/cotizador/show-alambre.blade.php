<div class="col-md-6 offset-md-3">
    <aside class="profile-nav alt">
        <section class="card">
            <div class="twt-feed bg-warning">
                <div class="row close-card">
                    <a href="{{ url('cotizadors/') }}" class="btn btn-border-none color-white">
                        <i class="ti-close"></i>
                    </a>
                </div>
                <div class="ti-link wtt-mark"></div>

                <div>
                    <a href="" data-toggle="modal" data-target="#mediumModal" class="float-left">
                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{ $alambre->fotoAlambre }}">
                    </a>
                    <div>
                        <h3 class="text-white display-6">{{ 'Alambre '.$alambre->tipoAlambre }}</h3>
                        <br>
                        <p class="text-light sz-sm text-white"><i class="fa fa-user"></i>{{ ' '.$cliente->nombres.' '.$cliente->apellidos }}</p>
                    </div>
                </div>
            </div>
            <ul class="list-group list-group-flush text-muted">
                <li class="list-group-item">
                    <i class="fa fa-dot-circle-o"></i> Awg: <strong>{{ $alambre->awg }}</strong>
                </li>
                <li class="list-group-item">
                    <i class="ti-import"></i>  Peso: <strong>{{ $alambre->peso }} </strong>Kg.
                </li>
                <li class="list-group-item">
                    <i class="fa fa-slack"></i> Cantidad: <strong>{{ $datos['cantidad'] }}</strong> [u]
                </li>

            </ul>
            <div class="weather-category twt-category">
                <ul>
                    <li class="text-warning">
                        <h4><strong>{{ $alambre->precio }}</strong></h4>
                        <i class="fa fa-bitcoin"></i> Precio por rollo
                    </li>
                    <li>
                        <!--IMPRIMIR COTIZACION-->
                        <form action="{{ route('cAlambre') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="cotizador_id" value="{{$cotizacion->id}}">
                            <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
                            <input type="hidden" name="alambre_id" value="{{$alambre->id}}">
                            <input type="hidden" name="awg" value="{{$alambre->awg}}">
                            <input type="hidden" name="peso" value="{{$alambre->peso}}">
                            <input type="hidden" name="cantidad" value="{{$datos['cantidad']}}">
                            <input type="hidden" name="precioUnit" value="{{$alambre->precio}}">
                            <input type="hidden" name="precioTotal" value="{{$datos['precioTotal']}}">
                            <button type="submit" class="btn btn-border-none btn-outline-danger">
                                <i class="fa fa-print fa-2x"></i>
                            </button>
                        </form>
                    </li>
                    <li class="text-primary">
                        <h3><strong>{{ $datos['precioTotal'] }}</strong></h3>
                        <i class="fa fa-bitcoin"></i> TOTAL
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
                <img class="align-self-center mr-3" style="width:460px;" alt="" src="{{ $alambre->fotoAlambre }}">
            </div>
        </div>
    </div>
</div>