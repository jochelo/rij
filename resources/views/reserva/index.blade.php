    @extends('layouts.font')

    @section('content')

        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Reservas</strong>
                        </div>
                        <!--                <div class="card-body table-stats order-table ov-h">-->
                        <div class="card-body">
                        <div class="table-stats t-responsive">
                            <!--<table id="bootstrap-data-table" class="table">-->
                            <table class="table">
                                <thead>
                                <tr>
                                    
                                    <th class="text-primary">Nombre</th>
                                    <th class="text-primary">Detalle</th>
                                    <th class="text-primary">Estado</th>
                                    <th class="text-primary">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reservas as $reserva)
                                    <tr>
                                        <td>{{ $reserva->nombre }}</td>
                                        <td>{{ $reserva->detalle }}</td>

                                        <td>
                                            <p> {{ $reserva->estado }}</p>
                                            {{-- check--}}
                                            {!!Form::open(['route'=>['reservas.updateP',$reserva->id],'method'=>'POST'])!!}
                                            <div class="primary-switch">
                                                @if($reserva->estado == 'espera')
                                                    <input type="checkbox" name="modificar" id="{{'mod'.$reserva->id}}" class="modificar">
                                                @else
                                                    <input type="checkbox" name="modificar" id="{{'mod'.$reserva->id}}" class="modificar" checked>
                                                @endif
                                                <label for="{{'mod'.$reserva->id}}" id="mm"></label>
                                            </div>
                                            {!!Form::close()!!}
                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <a class="btn-border-none btn btn-sm btn-outline-primary" href="{{ url('reservas/'.$reserva->id) }}">
                                                    <span class="ti-eye"></span>
                                                </a>

                                                <form class="float-right" action="{{ route('reservas.destroy',$reserva->id)}}" method="POST" onclick="return confirm('Estas seguro de que desea eliminar?')">
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
@section('scripts')
<script>
    $(document).ready(function(){
        $('.modificar').click(function(){
            var td=$(this).parents('td');
            
            var form=$(this).parents('form');
            var URL=form.attr('action');

            // console.log($(this).check);
            $.post(URL,form.serialize(),function(result){
                td.children('p').html(result.estado);
                // console.log(result);
            }).fail(function(){
                console.log('Algo salio mal');
            });
        });
    });
</script>
@endsection