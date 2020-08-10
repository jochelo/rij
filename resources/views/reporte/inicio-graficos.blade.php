@extends('layouts.font')
@section('content')
    <div class="col-lg-6 offset-md-2">
        <div class="card">
            <div class="card-header">
                <strong>Datos</strong> Reporte Grafico
            </div>
            <form action="{{ route('storeG') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <input type="hidden" name="url" id="url" value="{{ redirect()->getUrlGenerator()->previous() }}">

                <div class="card-body card-block">
                    <!--AÑO-->
                    @php($y=date('Y')-2)
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="anio" class=" form-control-label">Año</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="anio" id="anio" class="form-control @error('anio') is-invalid @enderror">
                                <option selected>Seleccione un Año</option>
                            @for($i=0;$i<10;$i++)
                                <option value="{{ $y+$i }}">{{ $y+$i }}</option>
                            @endfor
                            </select>
                            @error('anio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--MES-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="mes" class=" form-control-label">Mes</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="mes" id="mes" class="form-control @error('mes') is-invalid @enderror">
                                <option selected>Seleccione un Mes</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                            @error('mes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!--numero de meses-->
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="nMes" class=" form-control-label">Numero de Meses</label></div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="nMes" name="nMes" placeholder="Numero de Meses" class="form-control @error('nMes') is-invalid @enderror">
                            @error('nMes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti-check"></i> Generar
                            </button>
                            <a href="{{ url('/home') }}" class="btn btn-light">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection