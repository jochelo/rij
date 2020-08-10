<div class="tab-pane show active" id="malla" role="tabpanel" aria-labelledby="malla-tab">
    <div class="form-group">
        <input class="form-control" id="s-mallas" type="text" placeholder="Buscar..">
        <div class="list-group" id="c-mallas">
            @foreach($mallas as $malla)
                <button type="button" class="l-m list-group-item list-group-item-action" value="{{ $malla}}" onclick="cambioM({{$malla->id}}, '{{$malla->tipoMalla}}')">
                    @if(isset($malla->alto) && isset($malla->largo))
                    {{ 'Malla '.$malla->tipoMalla.' -- Alambre: '.$malla->alambre}}
                    <strong>{{'; Dimensión: '.$malla->alto.'x'.$malla->largo.' mts.' }}</strong>
                    @else
                    {{ 'Malla '.$malla->tipoMalla.' -- Celda: '.$malla->celda.' -- Alambre: '.$malla->alambre }}
                    @endif
                </button>
            @endforeach
        </div>
    </div>
    <div class="card datMalla">
        <div class="card-header">
            <div class="row">
                <div class="col-8"><strong>Completa</strong> los datos para la Cotizacion</div>
                <h2 id="nameMalla"></h2>
            </div>
        </div>
        <form action="{{ route('cotizadors.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="card-body card-block">
                <!--CLIENTE-->
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="cliente_id" class=" form-control-label">Cliente</label>
                    </div>
                    <div class="col-md-9">
<!--                        <select name="cliente_id" id="cliente_id" class="form-control form-control-sm selectpicker" data-show-subtext="true" data-live-search="true">-->
                        <select name="cliente_id" id="cliente_id" class="form-control form-control-sm">
                            @foreach($clientes as  $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombres.' '.$cliente->apellidos. ' -- '.$cliente->detalle }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!--alto-->
                <div id="alto_id">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="alto" class=" form-control-label">Alto</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="alto" name="alto" placeholder="Alto" class="form-control @error('alto') is-invalid @enderror">
                            @error('alto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!--largo-->
                <div id="largo_id">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="largo" class=" form-control-label">Largo</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="largo" name="largo" placeholder="Largo" class="form-control @error('largo') is-invalid @enderror">
                            @error('largo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!--malla-->
                <input type="hidden" name="malla_id" id="malla_id" value="">
                <!--cantidad-->
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="cantidad" class="form-control-label">Cantidad</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="cantidad" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror">
                        @error('cantidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-border-none btn-block">
                            <i class="ti-shopping-cart-full"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>