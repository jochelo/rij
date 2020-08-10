@extends('layouts.font')
@section('content')
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
                    <a href="{{ url('pedidos/') }}" class="btn btn-border-none float-right">
                        <i class="ti-close"></i>
                    </a>

                <div class="mx-auto d-block">
                    <!--<img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap">-->
                    <h2 class="text-sm-center mt-2 mb-1">{{ $pedido->cliente->nombres.' '.$pedido->cliente->apellidos }}</h2>
                    <hr>
                    <div class="location text-sm-center color-gray"><i class="fa fa-calendar"></i>Fecha: {{ $pedido->fecha }}</div>
                    <div class="location text-sm-center text-primary"><i class="fa fa-btc"></i> Total: <strong>{{ $pedido->total }} Bs.</strong></div>
                    <div class="location text-sm-center text-success"><i class="fa fa-btc"></i> A cuenta: <strong>{{ $pedido->cancelado }} Bs.</strong></div>
                    <div class="telephone text-sm-center text-danger"><i class="fa fa-btc"></i> Saldo:  <strong>{{ round($pedido->total-$pedido->cancelado,1) }} Bs.</strong></div>
                </div>
                <div class="content">
                    <div class="custom-control custom-checkbox mb-3 text-sm-center text-info">
                        <input type="checkbox" class="custom-control-input" id="detalles" >
                        <label class="custom-control-label" for="detalles" id="ldet">Ver detalles </label>
                        <i class="fa fa-info" id="ic"></i>
                    </div>
                    <div class="t-responsive" id="tabla">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Detalle</th>
                                <th scope="col">Precio[u]</th>
                                <th scope="col">SubTotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($ordenMallas=$pedido->ordenMallas)
                            @php($ordenAlambres=$pedido->ordenAlambres)
                            @foreach($ordenMallas as $ordenMalla)
                                <tr>
                                    <td>{{ $ordenMalla->cantidad }}</td>
                                    @if(!isset($ordenMalla->malla->alto) && !isset($ordenMalla->malla->largo))
                                        <td>{{ 'Malla '.$ordenMalla->malla->tipoMalla.' -- '.$ordenMalla->alto.'x'.$ordenMalla->largo}}
                                        </td>
                                        @else
                                        <td>{{ 'Malla '.$ordenMalla->malla->tipoMalla.' -- '.$ordenMalla->malla->alto.'x'.$ordenMalla->malla->largo}}
                                        </td>
                                        @endif
                                    <td>{{ $ordenMalla->precio }}</td>
                                    <td>{{ $ordenMalla->cantidad *$ordenMalla->precio }}</td>
                                </tr>
                            @endforeach
                            <!--orden alambres-->
                            @foreach($ordenAlambres as $ordenAlambre)
                                <tr>
                                    <td>{{ $ordenAlambre->cantidad }}</td>
                                    <td>{{ 'Alambre '.$ordenAlambre->alambre->tipoAlambre.' -- No: '.$ordenAlambre->alambre->awg}}</td>
                                    <td>{{ $ordenAlambre->precio }}</td>
                                    <td>{{ $ordenAlambre->cantidad *$ordenAlambre->precio }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        addEventListener('load',inicio,false);
        document.getElementById('tabla').style.display = 'none';
        document.getElementById('ldet').style.color= '#3ba0ee';
        function inicio()
        {
            document.getElementById('detalles').addEventListener('change',cambio,false);
        }

        function cambio()
        {
            //ocultar elementos
            if (document.getElementById('detalles').checked) {
                document.getElementById('tabla').style.display = 'block';
                document.getElementById('ldet').style.color = '#1ea93b';
                document.getElementById('ic').style.color = '#1ea93b';
            }
            else {
                document.getElementById('tabla').style.display = 'none';
                document.getElementById('ldet').style.color= '#3ba0ee';
                document.getElementById('ic').style.color= '#3ba0ee';
            }
        }
    </script>

@endsection
