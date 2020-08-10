@extends('layouts.font')
@section('content')
    <div class="col-lg-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8"><strong>Completa</strong> los datos de la Orden</div>
                    <div class="col-4 text-right">
                        <a href="{{ url('/pedidos/create') }}" class="btn btn-light btn-border-none">
                            <i class="ti-close"></i>
                        </a>
                    </div>
                </div>
            </div>
            <form action="{{ route('ordenMallas.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="col-6">
                    <div class="location text-sm-center text-primary"><i class="fa fa-info-circle"></i> Malla {{$malla->tipoMalla}}: <strong>{{ $malla->descripcion }} </strong></div>
                </div>
                <div class="card-body card-block">
                    @if(!isset($malla->alto) && !isset($malla->largo))
                    <!--alto-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="alto" class=" form-control-label">Alto</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="alto" name="alto" placeholder="Alto" class="form-control @error('alto') is-invalid @enderror" required>
                            @error('alto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--largo-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="largo" class=" form-control-label">Largo</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="largo" name="largo" placeholder="Largo" class="form-control @error('largo') is-invalid @enderror" required>
                            @error('largo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    @endif
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
                    <input type="hidden" name="pedido_id" id="pedido_id" value="{{ $datos['pedido_id'] }}">
                    <input type="hidden" name="malla_id" id="malla_id" value="{{ $datos['malla_id'] }}">
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
@endsection