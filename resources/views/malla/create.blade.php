@extends('layouts.font')
@section('content')
    <div class="col-lg-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <strong>Nueva</strong> Malla
            </div>
            <form action="{{ route('mallas.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="tipoMalla" class=" form-control-label">Tipo de Malla</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="tipoMalla" id="tipoMalla" class="form-control form-control-sm @error('tipoMalla') is-invalid @enderror">
                                <option selected>Seleccione una malla</option>
                                <option value="hexagonal">Malla Hexagonal</option>
                                <option value="olimpica">Malla Olimpica</option>
                                <option value="quinua">Malla de Quinua</option>
                                <option value="ganadera">Malla Ganadera</option>
                            </select>
                            @error('tipoMalla')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="celda" class="form-control-label">Celda</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="range" id="celda" name="celda" class="custom-range form-control-range @error('celda') is-invalid @enderror" min="1" max="22" step="0.5">
                            <span class="color-gray" id="temp">11.5</span> cm.
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
                            <input type="range" id="alambre" name="alambre" class="custom-range form-control-range @error('alambre') is-invalid @enderror" min="5" max="25">
                            <span class="color-gray" id="alam">15</span>
                            @error('alambre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{-- precio --}}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="precio" class=" form-control-label" id="lprecio">
                            Precio
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="precio" name="precio" placeholder="Precio" class="form-control @error('precio') is-invalid @enderror">
                            @error('precio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
                    <!--fotoMalla-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="fotoMalla" class=" form-control-label">Imagen</label></div>
                        <div class="col-12 col-md-9">
                            <div class="custom-file">
                                <input type="file" id="fotoMalla" name="fotoMalla" class="custom-file-input input-group-lg" accept="image\">
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
                            <textarea name="descripcion" id="descripcion" rows="9" placeholder="Ingrese una descripcion" class="form-control @error('descripcion') is-invalid @enderror"></textarea>

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
                                <i class="ti-check"></i> Ingresar
                            </button>
                            <a href="{{ url('/mallas') }}" class="btn btn-light">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
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
