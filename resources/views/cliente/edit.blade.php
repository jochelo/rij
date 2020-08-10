@extends('layouts.font')
@section('content')
    <div class="col-lg-6 offset-md-2">
        <div class="card">
            <div class="card-header">
                <strong>Datos</strong> Cliente
            </div>
            {!! Form::model($cliente,['url' => ['/clientes',$cliente->id], 'method' => 'PATCH','encrypt'=>'multipart/form-data','class' => 'form-horizontal','files' => true]) !!}
                <div class="card-body card-block">
                    <!--nombre-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="nombres" class=" form-control-label">Nombres</label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('nombres',null, ['id'=>'nombres','class'=>'form-control'] ) !!}

                            @error('nombres')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--apellido-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="apellidos" class=" form-control-label">Apellidos</label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('apellidos',null, ['id'=>'apellidos','class'=>'form-control'] ) !!}

                            @error('apellidos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--direccion-->
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="direccion" class=" form-control-label">Direccion</label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::textarea('direccion',null, ['id'=>'direccion','rows'=>'9','class'=>'form-control'] ) !!}

                            @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--celular-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="celular" class=" form-control-label">Celular</label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('celular',null, ['id'=>'celular','class'=>'form-control'] ) !!}

                            @error('celular')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--detalle-->
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="detalle" class=" form-control-label">Detalle</label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::textarea('detalle',null, ['id'=>'detalle','rows'=>'9','class'=>'form-control'] ) !!}

                            @error('detalle')
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
                            <a href="{{ url('/clientes') }}" class="btn btn-light">Cancelar</a>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection