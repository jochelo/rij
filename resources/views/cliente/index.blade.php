@extends('layouts.font')
@section('content')
<a class="btn-plus btn btn-primary" href="{{ route("clientes.create") }}"><i class="ti-plus"></i></a>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Clientes</strong>
                </div>
<!--                <div class="card-body table-stats order-table ov-h">-->
                <div class="content col-sm-4">
                    <input class="form-control" id="s-clientes" type="text" placeholder="Buscar..">
                </div>
                <div class="card-body">
                    <div class="table-stats t-responsive">
                        <!--<table id="bootstrap-data-table" class="table">-->
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-primary">Nombre</th>
                                <th class="text-primary">Direccion</th>
                                <th class="text-primary">Celular</th>
                                <th class="text-primary">Opciones</th>
                            </tr>
                            </thead>
                            <tbody id="c-clientes">
                            @foreach($clientes as $cliente)
                            <tr class="cli">
                                <td>{{ $cliente->nombres.' '.$cliente->apellidos }}</td>
                                <td>{{ $cliente->direccion }}</td>
                                <td>{{ $cliente->celular }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn-border-none btn btn-sm btn-outline-primary" href="{{ url('clientes/'.$cliente->id) }}">
                                            <span class="ti-eye"></span>
                                        </a>
                                        <a class="btn btn-border-none btn-sm btn-outline-success" href="{{ url('clientes/'.$cliente->id.'/edit') }}">
                                            <span class="ti-pencil"></span>
                                        </a>
<!--
                                        <form class="" action="{{ route('clientes.destroy',$cliente->id)}}" method="POST" onclick="return confirm('Estas seguro de que desea eliminar?')">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-border-none btn-sm btn-outline-danger">
                                                <span class="ti ti-trash"></span>
                                            </button>
                                        </form>-->
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
@section('scripts')
    <script>
        //clientes
        $(document).ready(function(){
            $("#s-clientes").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#c-clientes .cli").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });

            });
        });
    </script>
@endsection