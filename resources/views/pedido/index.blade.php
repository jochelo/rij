@extends('layouts.font')
@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
            <!--<div class="row m-2">
                <a class="btn btn-border-none btn-outline-primary btn-sm" href="{{ route("pedidos.create") }}"><i class="ti-plus"></i></a>
            </div>-->
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Pedidos</strong>
                    </div>
                    <div class="content col-sm-4">
                        <input class="form-control" id="s-pedidos" type="text" placeholder="Buscar..">
                    </div>
                    <div class="card-body">
                        <div class="table-stats t-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-primary">Fecha</th>
                                    <th class="text-primary">Cliente</th>
                                    <th class="text-primary">Total</th>
                                    <th class="text-primary">Estado</th>
                                    <th class="text-primary">Opciones</th>
                                </tr>
                                </thead>
                                <tbody id="c-pedidos">
                                @foreach($pedidos as $pedido)
                                    <tr class="ped">
                                        @php($date=date_create($pedido->fecha))
                                        <td class="text-muted">{{ date_format($date,'jS F Y') }}</td>
                                        <td>{{ $pedido->cliente->nombres.' '.$pedido->cliente->apellidos}}</td>
                                        <td>{{ $pedido->total }}</td>
                                        @if($pedido->cancelado>=$pedido->total)
                                            <td class="text-center"><button type="button" class="btn btn-border-none btn-outline-success" data-toggle="tooltip" data-placement="top" title="Saldado"><i class="fa fa-smile-o fa-2x "></i></button></td>
                                        @else
                                            @php($porcentajeCancelado=$pedido->cancelado*100/$pedido->total)
                                            <!--cancelado mas del 50%-->
                                            @if($porcentajeCancelado>'50')
                                                <td class="text-center"><button type="button" class="btn btn-border-none btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Pendiente"><i class="fa fa-meh-o fa-2x"></i></button></td>

                                            @else
                                                <!--cancelado menos o igual al 50%-->
                                                <td class="text-center"><button type="button" class="btn btn-border-none btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Pendiente de Riesgo"><i class="fa fa-frown-o fa-2x"></i></button></td>
                                            @endif
                                        @endif
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn-border-none btn btn-sm btn-outline-primary" href="{{ url('pedidos/'.$pedido->id) }}" data-toggle="tooltip" data-placement="top" title="Ver">
                                                    <span class="ti-eye"></span>
                                                </a>
                                                @if(!$pedido->estado)

                                                <a class="btn btn-border-none btn-sm btn-outline-success" href="{{ url('pedidos/'.$pedido->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Actualizar Pago">
                                                    <span class="fa fa-money"></span>
                                                </a>

                                                @endif

                                            @if($pedido->total==0)
                                                <form class="float-right" action="{{ route('pedidos.destroy',$pedido->id)}}" method="POST" onclick="return confirm('Estas seguro de que desea eliminar?')">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-border-none btn-sm btn-outline-danger">
                                                        <span class="ti ti-trash"></span>
                                                    </button>
                                                </form>
                                            @endif
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
        //pedidos
        $(document).ready(function(){
            $("#s-pedidos").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#c-pedidos .ped").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });

            });
        });
    </script>
@endsection