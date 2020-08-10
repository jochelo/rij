@extends('layouts.font')
@section('content')
    <div class="col-lg-6 offset-md-2">
        <div class="card">
            <div class="card-header">
                <strong>Nuevo</strong> Alambre
            </div>
            <form action="{{ route('alambres.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="tipoAlambre" class=" form-control-label">Tipo de Alambre</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="tipoAlambre" id="tipoAlambre" class="form-control form-control-sm @error('tipoAlambre') is-invalid @enderror">
                                <option selected>Seleccione un alambre</option>
                                <option value="amarre">Alambre de Amarre</option>
                                <option value="galvanizado">Alambre Galvanizado</option>
                                <option value="puas">Alambre de Puas</option>
                            </select>
                            @error('tipoAlambre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="awg" class="form-control-label">Numero</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="range" id="awg" name="awg" class="custom-range form-control-range @error('awg') is-invalid @enderror" min="5" max="25">
                            <span class="color-gray" id="aw">15</span>
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
                            <input type="text" id="peso" name="peso" placeholder="Peso" class="form-control @error('peso') is-invalid @enderror">
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
                            <input type="text" id="precio" name="precio" placeholder="Precio" class="form-control @error('precio') is-invalid @enderror">
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
                                <input type="file" id="fotoAlambre" name="fotoAlambre" class="custom-file-input" accept="image\">
                                <label id="fAlambre" class="custom-file-label" for="fotoAlambre" data-browse="Elegir">Seleccionar Archivo</label>
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
                            <a href="{{ url('/alambres') }}" class="btn btn-light">Cancelar</a>
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

            document.getElementById('awg').addEventListener('change',cambioRango,false);
            document.getElementById('tipoAlambre').addEventListener('change',cambioRango,false);
            document.getElementById('fotoAlambre').addEventListener('change',cambioRango,false);
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
