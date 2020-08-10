@extends('layouts.font')
@section('content')
    <div class="col-lg-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h3>Realice su pedido</h3>
            </div>
            <div class="card-body">
                <div class="default-tab">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link" id="nav-malla-tab" data-toggle="tab" href="#nav-malla" role="tab" aria-controls="nav-malla" aria-selected="true">Mallas</a>
                            <a class="nav-item nav-link" id="nav-alambre-tab" data-toggle="tab" href="#nav-alambre" role="tab" aria-controls="nav-alambre" aria-selected="false">Alambres</a>
                            <a class="nav-item nav-link active" id="nav-orden-tab" data-toggle="tab" href="#nav-orden" role="tab" aria-controls="nav-orden" aria-selected="false">Ordenes</a>
                        </div>
                    </nav>
                    <div class="tab-content " id="nav-tabContent">
                        <!--mallas-->
                        <div class="content-top tab-pane fade" id="nav-malla" role="tabpanel" aria-labelledby="nav-malla-tab">
                            <!--mallas-->
                            <input class="form-control" id="s-mallas" type="text" placeholder="Buscar..">
                            <div class="content-top" id="c-mallas">
                                @php($i=0)
                                @foreach($mallas as $malla)
                                    @if($i%2==0)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                                    <img class="card-img-top sz-car" src="{{$malla->fotoMalla}}" alt="Img Malla">
                                                    <div class="card-body">
                                                        <h4 class="card-title mb-3">{{ 'Malla '.$malla->tipoMalla }}</h4>
                                                        <p style="font-size: small;" class="card-text">Celda: <strong>{{$malla->celda}}</strong></p>
                                                        <p style="font-size: small;" class="card-text">Alambre: <strong>{{$malla->alambre}}</strong></p>
                                                        <p class="card-text text-primary">Precio: <strong>{{$malla->precio.' Bs.'}}</strong></p>
                                                        @if($malla->tipoMalla!='olimpica')
                                                        <p class="card-text text-success">Dimensión: <strong>{{$malla->alto.'x'.$malla->largo}}</strong></p>
                                                        @endif

                                                    </div>
                                                    <a href="{{ url('ordenMalla/'.$datos->id.'/'.$malla->id) }}" class="btn btn-success btn-border-none btn-block">
                                                        <span class="ti-shopping-cart-full"></span>
                                                    </a>
                                                </div>
                                            </div>
                                    @else
                                            <div class="col-md-6">
                                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                                    <img class="card-img-top sz-car" src="{{$malla->fotoMalla}}" alt="Img Malla">
                                                    <div class="card-body">
                                                        <h4 class="card-title mb-3">{{ 'Malla '.$malla->tipoMalla }}</h4>
                                                        <p style="font-size: small;" class="card-text">Celda: <strong>{{$malla->celda}}</strong></p>
                                                        <p style="font-size: small;" class="card-text">Alambre: <strong>{{$malla->alambre}}</strong></p>
                                                        <p class="card-text text-primary">Precio: <strong>{{$malla->precio.' Bs.'}}</strong></p>
                                                        @if($malla->tipoMalla!='olimpica')
                                                        <p class="card-text text-success">Dimensión: <strong>{{$malla->alto.'x'.$malla->largo}}</strong></p>
                                                        @endif
                                                    </div>
                                                    <a href="{{ url('ordenMalla/'.$datos->id.'/'.$malla->id) }}" class="btn btn-success btn-border-none btn-block">
                                                        <span class="ti-shopping-cart-full"></span>
                                                    </a>
                                                </div>
                                            </div>
                                    @endif
                                    @if (($i+1)%2==0)
                                        </div>
                                    @endif
                                    @php($i++)
                                @endforeach
                                @if (($i+1)%2==0)
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!--alambres-->
                        <div class="content-top tab-pane fade" id="nav-alambre" role="tabpanel" aria-labelledby="nav-alambre-tab">
                            <!--alambre-->
                            <input class="form-control" id="s-alambres" type="text" placeholder="Buscar..">
                            <div class="content-top" id="c-alambres">
                                @php($i=0)
                                @foreach($alambres as $alambre)
                                    @if($i%2==0)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                                    <img class="card-img-top sz-car" src="{{$alambre->fotoAlambre}}" alt="Img Alambre">
                                                    <div class="card-body">
                                                        <h4 class="card-title mb-3">{{ 'Alambre '.$alambre->tipoAlambre }}</h4>
                                                        <p class="card-text">Awg: <strong>{{$alambre->awg}}</strong></p>
                                                        <p class="card-text">Peso: <strong>{{$alambre->peso}}</strong></p>
                                                        <p class="card-text text-primary">Descripcion: <strong>{{$alambre->descripcion}}</strong></p>
                                                    </div>

                                                    <a href="{{ url('ordenAlambre/'.$datos->id.'/'.$alambre->id) }}" class="btn btn-success btn-border-none btn-block">
                                                        <span class="ti-shopping-cart-full"></span>
                                                    </a>
                                                </div>
                                            </div>
                                    @else
                                            <div class="col-md-6">
                                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                                    <img class="card-img-top sz-car" src="{{$alambre->fotoAlambre}}" alt="Img Alambre">
                                                    <div class="card-body">
                                                        <h4 class="card-title mb-3">{{ 'Alambre '.$alambre->tipoAlambre }}</h4>
                                                        <p class="card-text">Awg: <strong>{{$alambre->peso}}</strong></p>
                                                        <p class="card-text">Peso: <strong>{{$alambre->peso}}</strong></p>
                                                        <p class="card-text text-primary">Descripcion: <strong>{{$alambre->descripcion}}</strong></p>
                                                    </div>
                                                    <a href="{{ url('ordenAlambre/'.$datos->id.'/'.$alambre->id) }}" class="btn btn-success btn-border-none btn-block">
                                                        <span class="ti-shopping-cart-full"></span>
                                                    </a>
                                                </div>
                                            </div>
                                    @endif
                                    @if (($i+1)%2==0)
                                        </div>
                                    @endif
                                    @php($i++)
                                @endforeach
                                @if (($i+1)%2==0)
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!--ordenes-->
                        <div class="tab-pane show active" id="nav-orden" role="tabpanel" aria-labelledby="nav-orden-tab">
                            <!--orden mallas-->
                            @if(sizeof($ordenAlambres)!='0' or sizeof($ordenMallas)!='0')

                            <div class="card-header">
                                <strong class="card-title">Ordenes</strong>
                            </div>
                            @php($total=0)
                            <div class="t-responsive">
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
                                        <td>{{ round($ordenMalla->cantidad *$ordenMalla->precio,1) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form class="float-right" action="{{ route('ordenMallas.destroy',$ordenMalla->id)}}" method="POST" onclick="return confirm('Esta seguro de que desea eliminar?')">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-border-none btn-sm btn-outline-danger">
                                                        <span class="ti ti-trash"></span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @php($total+=($ordenMalla->cantidad *$ordenMalla->precio))
                                @endforeach
                                <!--orden alambres-->
                                @foreach($ordenAlambres as $ordenAlambre)
                                    <tr>
                                        <td>{{ $ordenAlambre->cantidad }}</td>
                                        <td>{{ 'Alambre '.$ordenAlambre->alambre->tipoAlambre.' -- No: '.$ordenAlambre->alambre->awg}}</td>
                                        <td>{{ $ordenAlambre->precio }}</td>
                                        <td>{{ round($ordenAlambre->cantidad *$ordenAlambre->precio,1) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form class="float-right" action="{{ route('ordenAlambres.destroy',$ordenAlambre->id)}}" method="POST" onclick="return confirm('Esta seguro de que desea eliminar?')">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-border-none btn-sm btn-outline-danger">
                                                        <span class="ti ti-trash"></span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @php($total+=($ordenAlambre->cantidad *$ordenAlambre->precio))
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if(sizeof($ordenAlambres)!='0' or sizeof($ordenMallas)!='0')
                <div class="content">
                    {!! Form::model($datos,['url' => ['/pedidos',$datos->id], 'method' => 'PATCH','encrypt'=>'multipart/form-data','class' => 'form-horizontal was-validated','files' => true]) !!}
                        <!--check-->
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="modificar" >
                            <label class="custom-control-label" for="modificar" id="lmod">Modificar Total</label>
                            <div id="pie-help" class="sz-sm">Caso contrario el TOTAL se mantendra como se observa</div>
                        </div>
                        <!--total-->
                        @php($total=round($total,1))
                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="total" class=" form-control-label">Total</label></div>
                            <div class="col-12 col-md-10">
                                <h3 id="totalH">{{ $total }}</h3>
                                <input type="text" id="total" name="total" class="form-control @error('total') is-invalid @enderror" value="{{ $total }}">
                                @error('total')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!--Cancelado-->
                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="total" class=" form-control-label">Cancelado</label></div>
                            <div class="col-12 col-md-10">
                                {!! Form::text('cancelado',null, ['id'=>'cancelado','class'=>'form-control @error("cancelado") is-invalid @enderror']) !!}
                                @error('cancelado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-border-none btn-outline-secondary btn-block">
                                <i class="ti-check-box"></i>
                                Finalizar
                            </button>
                        </div>
                    {!! Form::close() !!}
                </div>
                @else
                    <div class="content color-gray">
                        <h2>No existen ordenes realizadas.</h2>
                        <h5>Por favor seleccione algun producto.</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $("#s-mallas").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#c-mallas .col-md-6").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        $(document).ready(function(){
            $("#s-alambres").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#c-alambres .col-md-6").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        addEventListener('load',inicio,false);
        document.getElementById('total').style.display = 'none';
        document.getElementById('lmod').style.color= '#ee0000';
        function inicio()
        {
            document.getElementById('modificar').addEventListener('change',cambio,false);
        }

        function cambio()
        {
            //ocultar elementos
            if (document.getElementById('modificar').checked) {
                document.getElementById('total').style.display = 'block';
                document.getElementById('totalH').style.display = 'none';
                document.getElementById('pie-help').style.display = 'none';
                document.getElementById('lmod').style.color = '#1ea93b';
            }
            else {
                document.getElementById('total').style.display = 'none';
                document.getElementById('totalH').style.display = 'block';
                document.getElementById('pie-help').style.display = 'block';
                document.getElementById('lmod').style.color= '#ee0000';
            }
        }
    </script>

@endsection
