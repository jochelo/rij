@extends('layouts.font')
@section('content')
    <div class="col-lg-6 offset-md-2">
        <div class="card">
            <div class="card-header">
                <strong>Nuevo</strong> Cliente
            </div>
            <form action="{{ route('clientes.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <input type="hidden" name="url" id="url" value="{{ redirect()->getUrlGenerator()->previous() }}">
                <div class="card-body card-block">
                    <!--nombre-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="nombres" class=" form-control-label">Nombres</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nombres" name="nombres" placeholder="nombres"
                                   class="form-control @error('nombres') is-invalid @enderror">
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
                            <input type="text" id="apellidos" name="apellidos" placeholder="apellidos"
                                   class="form-control @error('apellidos') is-invalid @enderror">
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
                            <textarea name="direccion" id="direccion" rows="9" placeholder="ingrese una direccion"
                                      class="form-control @error('direccion') is-invalid @enderror"></textarea>
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
                            <input type="text" id="celular" name="celular" placeholder="celular"
                                   class="form-control @error('celular') is-invalid @enderror">
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
                            <textarea name="detalle" id="detalle" rows="9" placeholder="ingrese un detalle"
                                      class="form-control @error('detalle') is-invalid @enderror"></textarea>

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
                                <i class="ti-check"></i> Registrar
                            </button>
                            @if(redirect()->getUrlGenerator()->previous() == url('/clientes'))
                                <a href="{{ url('/clientes') }}" class="btn btn-light">cancelar</a>
                            @else
                                <a href="{{ url('/inicio') }}" class="btn btn-light">cancelar</a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
