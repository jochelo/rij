@extends('layouts.font')
@section('content')
<a class="btn-plus btn btn-primary " href="{{ route("mallas.create") }}"><i class="ti-plus"></i></a>
<div class="animated fadeIn">

    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Mallas</strong>
                </div>
<!--                <div class="card-body table-stats order-table ov-h">-->
                <div class="card-body ">
                    <div class="table-stats t-responsive">
                        <!--<table id="bootstrap-data-table" class="table">-->
                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th class="text-primary">Nombre</th>
                                <th class="text-primary">Celda</th>
                                <th class="text-primary">Dimensión</th>
                                <th class="text-primary">Précio</th>
                                <th class="text-primary">Opciónes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mallas as $malla)
                            <tr>
                                <td class="">
                                    <a href=""><img class=" avatar-i rounded-circle" src="{{ $malla->fotoMalla }}" alt=""></a>
                                </td>
                                <td>{{ 'Malla '.$malla->tipoMalla }}</td>
                                <td>{{ $malla->celda }}</td>
                                @if($malla->tipoMalla != 'olimpica')
                                <td>{{ $malla->alto.'x'.$malla->largo }}</td>
                                <td>{{ 'Bs. '.$malla->precio }}</td>
                                @else
                                <td>---</td>
                                <td>{{ 'Bs. '.$malla->precio.' [m2]'}}</td>
                                @endif
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-border-none btn-sm btn-outline-primary" href="{{ url('mallas/'.$malla->id) }}" data-toggle="tooltip" data-placement="top" title="Ver">
                                            <span class="ti-eye"></span>
                                        </a>
                                        <a class="btn btn-border-none btn-sm btn-outline-success " href="{{ url('mallas/'.$malla->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <span class="ti-pencil"></span>
                                        </a>
                                        <form class="float-right" action="{{ route('mallas.destroy',$malla->id)}}" method="POST" onclick="return confirm('Estas seguro de que desea eliminar?')">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-border-none btn-sm btn-outline-danger">
                                                <span class="ti ti-trash"></span>
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection