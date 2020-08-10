<div class="tab-pane fade" id="alambre" role="tabpanel" aria-labelledby="alambre-tab"   >
    <div class="form-group">
        <input class="form-control" id="s-alambres" type="text" placeholder="Buscar..">
        <div class="list-group" id="c-alambres">
            @foreach($alambres as $alambre)
                <button type="button" class="l-l list-group-item list-group-item-action" value="{{ $alambre}}" onclick="cambioA({{$alambre->id}}, '{{$alambre->tipoAlambre}}')">
                    {{ 'Alambre '.$alambre->tipoAlambre.' -- Awg: '.$alambre->awg.' -- Peso: '.$alambre->peso }}
                </button>

            @endforeach
        </div>
    </div>
    <div class="container card datAlambre">
        <div class="card-header">
            <div class="row">
                <div class="col-8"><strong>Completa</strong> los datos para la Cotizacion</div>
                <h4 id="nameAlambre"></h4>
            </div>
        </div>
        <form action="{{ route('cotizadors.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="card-body card-block">
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
                <!--alambre-->
                <input type="hidden" name="alambre_id" id="alambre_id" value="">
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