@extends('layouts.font')
@section('content')
    <a class="btn-plus btn btn-primary" href="{{ route("clientes.create") }}"><i class="ti-plus"></i></a>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Seleccione un </strong> Cliente
                    </div>
                    <div class="content col-sm-6">
                        <input class="form-control" id="s-clientes" type="text" placeholder="Buscar..">
                    </div>

                    <div class="card-body ">
                        <div class="table-stats t-responsive table-hover">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-primary"><span class="fa fa-user-o"></span> Cliente </th>
                                    <th class="text-primary"><span class="fa fa-map-marker"></span> Direccion</th>
                                    <th class="text-primary"><span class="fa fa-phone"></span> Celular </th>
                                    <th class="text-primary">Opciones</th>
                                </tr>
                                </thead>
                                <tbody id="c-clientes">
                                @foreach($clientes as $cliente)
                                    <tr class="cli">
                                        <td>{{ $cliente->nombres.' '.$cliente->apellidos }}</td>
                                        <td class="text-muted">{{ $cliente->direccion }}</td>
                                        <td>{{ $cliente->celular }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn-border-none btn btn-lg btn-outline-success" href="{{ url('pedidos/'.$cliente->id.'/crear') }}" data-toggle="tooltip" data-placement="top" title="Ofertar">
                                                    <span class="ti-shopping-cart"></span>
                                                </a>
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