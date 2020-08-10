@extends('layouts.font')
@section('content')
    <div class="col-lg-6 offset-md-2">
        <div class="card">
            <div class="card-header">
                <strong>Datos</strong> Malla
            </div>
            {!! Form::model($malla,['url' => ['/mallas',$malla->id], 'method' => 'PATCH','encrypt'=>'multipart/form-data','class' => 'form-horizontal','files' => true]) !!}
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="tipoMalla" class=" form-control-label">Tipo de Malla</label>
                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('tipoMalla',null, ['id'=>'tipoMalla','class'=>'form-control','disabled' ]) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="celda" class="form-control-label">Celda</label>
                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::macro('celda',function ($dat){return '<input id="celda" name="celda" type="range" value="'.$dat.'" class="custom-range form-control-range" min="2" max="22" step="0.5">';}); !!}
                            {!!  Form::celda($malla->celda) !!}
                            <span class="color-gray" id="temp">{{ $malla->celda }}</span> cm.

                            @error('celda')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="alambre" class="form-control-label">Alambre</label>
                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::macro('alambre',function ($al){return '<input id="alambre" name="alambre" type="range" value="'.$al.'" class="custom-range form-control-range" min="5" max="25">';}); !!}
                            {!!  Form::alambre($malla->alambre) !!}
                            <span class="color-gray" id="alam">{{$malla->alambre}}</span>

                            @error('alambre')
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
                    {{-- alto --}}
                    <div id="alto_id">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="alto" class=" form-control-label">Alto</label></div>
                            <div class="col-12 col-md-9">
                                {!! Form::text('alto',null, ['id'=>'alto','class'=>'form-control'] ) !!}
                                @error('alto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- largo --}}
                    <div id="largo_id">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="largo" class=" form-control-label">Largo</label></div>
                            <div class="col-12 col-md-9">
                                {!! Form::text('largo',null, ['id'=>'largo','class'=>'form-control'] ) !!}
                                @error('largo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!--fotoMalla-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="fotoMalla" class=" form-control-label">Imagen</label></div>
                        <div class="col-12 col-md-9">
                            <div class="custom-file">
                                <input type="file" id="fotoMalla" name="fotoMalla" class="custom-file-input" accept="image\">
                                <label id="fMalla" class="custom-file-label" for="fotoMalla" data-browse="Elegir">Seleccionar Archivo</label>
                            </div>
                            @error('fotoMalla')
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
                            <a href="{{ url('/mallas') }}" class="btn btn-light">Cancelar</a>
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
            document.getElementById('celda').addEventListener('change',cambioRango,false);
            document.getElementById('alambre').addEventListener('change',cambioRango,false);
            document.getElementById('tipoMalla').addEventListener('change',cambioRango,false);
            document.getElementById('fotoMalla').addEventListener('change',cambioRango,false);
            var valor=document.getElementById('tipoMalla').value;
            switch (valor) {
                case 'hexagonal':
                    document.getElementById('alambre').value='22';
                    document.getElementById('alambre').style.display='none';

                    document.getElementById('celda').value='2.5';
                    document.getElementById('celda').style.display='none';

                    document.getElementById('alto_id').style.display='block';
                    document.getElementById('largo_id').style.display='block';

                    document.getElementById('precio').placeholder='Precio';
                    document.getElementById('lprecio').innerHTML='Precio';
                    break;
                case 'quinua':
                    document.getElementById('alambre').value='15';
                    document.getElementById('alambre').style.display='none';

                    document.getElementById('celda').value='2';
                    document.getElementById('celda').style.display='none';

                    document.getElementById('alto_id').style.display='block';
                    document.getElementById('largo_id').style.display='block';

                    document.getElementById('precio').placeholder='Precio';
                    document.getElementById('lprecio').innerHTML='Precio';
                    break;
                case 'ganadera':
                    document.getElementById('alambre').value='8';
                    document.getElementById('alambre').style.display='none';

                    document.getElementById('celda').value='15';
                    document.getElementById('celda').style.display='none';

                    document.getElementById('alto_id').style.display='block';
                    document.getElementById('largo_id').style.display='block';

                    document.getElementById('precio').placeholder='Precio';
                    document.getElementById('lprecio').innerHTML='Precio';
                    break;
                case 'olimpica':
                    document.getElementById('alambre').style.display='block';
                    document.getElementById('celda').style.display='block';

                    document.getElementById('alto_id').style.display='none';
                    document.getElementById('largo_id').style.display='none';

                    document.getElementById('precio').placeholder='Precio por metro cuadrado';
                    document.getElementById('lprecio').innerHTML='Precio m2';
                    break;
            }
            document.getElementById('temp').value=document.getElementById('celda').value;
            document.getElementById('alam').value=document.getElementById('alambre').value;

        }

        function cambioRango()
        {
            //ocultar elementos
            var valor=document.getElementById('tipoMalla').value;
            switch (valor) {
                case 'hexagonal':
                    document.getElementById('alambre').value='22';
                    document.getElementById('alambre').style.display='none';

                    document.getElementById('celda').value='2.5';
                    document.getElementById('celda').style.display='none';

                    document.getElementById('alto_id').style.display='block';
                    document.getElementById('largo_id').style.display='block';

                    document.getElementById('precio').placeholder='Precio';
                    document.getElementById('lprecio').innerHTML='Precio';
                    break;
                case 'quinua':
                    document.getElementById('alambre').value='15';
                    document.getElementById('alambre').style.display='none';

                    document.getElementById('celda').value='2';
                    document.getElementById('celda').style.display='none';

                    document.getElementById('alto_id').style.display='block';
                    document.getElementById('largo_id').style.display='block';

                    document.getElementById('precio').placeholder='Precio';
                    document.getElementById('lprecio').innerHTML='Precio';
                    break;
                case 'ganadera':
                    document.getElementById('alambre').value='8';
                    document.getElementById('alambre').style.display='none';

                    document.getElementById('celda').value='15';
                    document.getElementById('celda').style.display='none';

                    document.getElementById('alto_id').style.display='block';
                    document.getElementById('largo_id').style.display='block';

                    document.getElementById('precio').placeholder='Precio';
                    document.getElementById('lprecio').innerHTML='Precio';
                    break;
                case 'olimpica':
                    document.getElementById('alambre').style.display='block';
                    document.getElementById('celda').style.display='block';
                    document.getElementById('alto_id').style.display='none';
                    document.getElementById('largo_id').style.display='none';

                    document.getElementById('precio').placeholder='Precio por metro cuadrado';
                    document.getElementById('lprecio').innerHTML='Precio m2';
                    break;
            }
            document.getElementById('temp').innerHTML=document.getElementById('celda').value;
            document.getElementById('alam').innerHTML=document.getElementById('alambre').value;
            document.getElementById('fMalla').innerHTML=document.getElementById('fotoMalla').value;

        }
    </script>
@endsection
