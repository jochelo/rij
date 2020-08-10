@extends('layouts.font')
@section('content')
    <div class="col-lg-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8"><strong>Completa</strong> los datos del Orden</div>
                    <div class="col-4 text-right">
                        <a href="{{ url('/pedidos/create') }}" class="btn btn-light btn-border-none">
                            <i class="ti-close"></i>
                        </a>
                    </div>
                </div>
            </div>
            <form action="{{ route('ordenAlambres.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="col-6">
                    <div class="location text-sm-center text-primary"><i class="fa fa-info-circle"></i> Descripcion: <strong>{{ $alambre->descripcion }} </strong></div>
                </div>
                <div class="card-body card-block">
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
                    <input type="hidden" name="alambre_id" id="alambre_id" value="{{ $datos['alambre_id'] }}">
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