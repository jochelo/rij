@extends('layouts.font')
@section('content')
    <div class="col-lg-6 offset-md-2">
        <div class="card">
            <div class="card-header">
                <strong>Datos</strong> Alambre
            </div>
            {!! Form::model($alambre,['url' => ['/alambres',$alambre->id], 'method' => 'PATCH','encrypt'=>'multipart/form-data','class' => 'form-horizontal','files' => true]) !!}
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="tipoAlambre" class=" form-control-label">Tipo de Alambre</label>
                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('tipoAlambre',null, ['id'=>'tipoAlambre','class'=>'form-control','disabled' ]) !!}
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="awg" class="form-control-label">Numero</label>
                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::macro('awg',function ($al){return '<input id="awg" name="awg" type="range" value="'.$al.'" class="custom-range form-control-range" min="5" max="25">';}); !!}
                            {!!  Form::awg($alambre->awg) !!}
                            <span class="color-gray" id="aw">{{$alambre->awg}}</span>

                            @error('awg')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="peso" class=" form-control-label">Peso</label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('peso',null, ['id'=>'peso','class'=>'form-control'] ) !!}

                            @error('peso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="precio" class=" form-control-label">Precio</label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('precio',null, ['id'=>'precio','class'=>'form-control'] ) !!}

                            @error('precio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!--fotoAlambre-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="fotoAlambre" class=" form-control-label">Imagen</label></div>
                        <div class="col-12 col-md-9">
                            <div class="custom-file">
                                <input type="file" id="fotoAlambre" name="fotoAlambre" class="custom-file-input">
                                <label id="fAlambre" class="custom-file-label" for="fotoAlambre">Seleccionar Archivo</label>
                            </div>
                            @error('fotoAlambre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="descripcion" class=" form-control-label">Descripcion</label></div>
                        <div class="col-12 col-md-9">
                            {!! Form::textarea('descripcion',null, ['id'=>'descripcion','rows'=>'9','class'=>'form-control'] ) !!}

                            @error('descripcion')
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
                            <a href="{{ url('/alambres') }}" class="btn btn-light">Cancelar</a>
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
            document.getElementById('awg').addEventListener('change',cambioRango,false);
            document.getElementById('tipoAlambre').addEventListener('change',cambioRango,false);
            document.getElementById('fotoAlambre').addEventListener('change',cambioRango,false);
            var valor=document.getElementById('tipoAlambre').value;
            switch (valor) {
                case 'amarre':
                    document.getElementById('awg').value='15';
                    document.getElementById('awg').style.display='none';
                    break;
                case 'puas':
                    document.getElementById('awg').value='16';
                    document.getElementById('awg').style.display='none';
                    break;
                case 'galvanizado':
                    document.getElementById('awg').style.display='block';
                break;
            }
            document.getElementById('aw').innerHTML=document.getElementById('awg').value;
        }
        function cambioRango()
        {
            //ocultar elementos
            var valor=document.getElementById('tipoAlambre').value;
            switch (valor) {
                case 'amarre':
                    document.getElementById('awg').value='15';
                    document.getElementById('awg').style.display='none';
                    break;
                case 'puas':
                    document.getElementById('awg').value='16';
                    document.getElementById('awg').style.display='none';
                    break;
                case 'galvanizado':
                    document.getElementById('awg').style.display='block';
                    break;
            }
            document.getElementById('aw').innerHTML=document.getElementById('awg').value;
            document.getElementById('fAlambre').innerHTML=document.getElementById('fotoAlambre').value;
        }
    </script>
@endsection
