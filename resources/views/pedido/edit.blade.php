@extends('layouts.font')
@section('content')
    <div class="col-lg-6 offset-md-2">
        <div class="card">
            <div class="card-header">
                <div class="float-left"><strong>Pago</strong> Pedido</div>
                <div class="float-right">{{ $pedido->cliente->nombres.' '.$pedido->cliente->apellidos }}</div>

            </div>
            {!! Form::model($pedido,['url' => ['/pedidos',$pedido->id], 'method' => 'PATCH','encrypt'=>'multipart/form-data','class' => 'form-horizontal','files' => true]) !!}
                <div class="card-body card-block">
                    <div class="row">
                        <div class="col-4">
                            <div class="location text-sm-center text-primary"><i class="fa fa-btc"></i> Total: <strong>{{ $pedido->total }} Bs.</strong></div>
                        </div>
                        <div class="col-4 text-center">
                            <i class="fa fa-dollar fa-5x fa-fw"></i>
                        </div>
                        <div class="col-4">
                            <div class="telephone text-sm-center text-danger"><i class="fa fa-btc"></i> Saldo:  <strong>{{ round($pedido->total-$pedido->cancelado,1) }} Bs.</strong></div>
                        </div>
                    </div>
                    <br>
                    <!--cancelado-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="ingreso" class=" form-control-label">Deposito: </label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('ingreso',null, ['id'=>'ingreso','class'=>'form-control'] ) !!}
                            @error('ingreso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti-reload"></i> Actualizar
                            </button>
                            <a href="{{ url('/pedidos') }}" class="btn btn-light">Cancelar</a>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection