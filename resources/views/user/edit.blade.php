@extends('layouts.font')
@section('content')
    <div class="col-lg-6 offset-md-2">
        <div class="card">
            <div class="card-header">
                <strong>Datos</strong> Cliente
            </div>
            {!! Form::model($user,['url' => ['/users',$user->id], 'method' => 'PATCH','class' => 'form-horizontal','files' => true]) !!}
                <div class="card-body card-block">
                    <!--nombre-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="nombre" class=" form-control-label">Nombre</label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('nombre',null, ['id'=>'nombre','class'=>'form-control'] ) !!}

                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--email-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="email" class=" form-control-label">Correo Electronico</label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::email('email',null, ['id'=>'email','class'=>'form-control'] ) !!}

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--cuenta-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="cuenta" class=" form-control-label">Cuenta</label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('cuenta',null, ['id'=>'cuenta','class'=>'form-control'] ) !!}

                            @error('cuenta')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!--fotoUser-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="foto" class=" form-control-label">Imagen</label></div>
                        <div class="col-12 col-md-9">
                            <div class="custom-file">
                                <input type="file" id="foto" name="foto" class="custom-file-input @error('foto') is-invalid @enderror" accept="image\">
                                <label id="fuser" class="custom-file-label" for="foto" data-browse="Elegir">Seleccionar Archivo</label>
                            </div>
                            @error('foto')
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
                            <a href="{{ url('/users') }}" class="btn btn-light">Cancelar</a>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('head')
    <script>
        addEventListener('load',inicio,false);

        function inicio()
        {
            document.getElementById('foto').addEventListener('change',cambioRango,false);
        }

        function cambioRango()
        {
           document.getElementById('fuser').innerHTML=document.getElementById('foto').value;
        }
    </script>
@endsection