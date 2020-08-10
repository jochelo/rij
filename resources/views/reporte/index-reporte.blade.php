@extends('layouts.font')
@section('content')
    <div class="row">
        <!--CLIENTE POTENCIAL-->
        <div class="col-md-8 offset-md-2">
            <div class="card text-center text-white bg-success">
                <div class="card-header">
                    Clientes Potenciales
                </div>
                <div class="card-body">
                    <!--<h5 class="card-title">Special title treatment</h5>
                    <p class="card-text text-white">With supporting text below as a natural lead-in to additional content.</p>-->
                    <a href="{{ url('/reporte/clientePot/'.$datos['fei'].'/'.$datos['fef'].'/') }}" class="btn btn-border-none btn-outline-light"><i class="fa fa-file-pdf-o fa-2x"></i></a>
                </div>
            </div>
        </div>
        <!--CLIENTE TIEMPO DE PAGO DE DEUDAS-->
        <div class="col-md-8 offset-md-2 ">
            <div class="card text-center text-white bg-secondary">
                <div class="card-header">
                    Tiempo de Pago Clientes
                </div>
                <div class="card-body">
                    <!--<h5 class="card-title">Special title treatment</h5>
                    <p class="card-text text-white">With supporting text below as a natural lead-in to additional content.</p>-->
                    <a href="{{ url('/reporte/clienteTime/') }}" class="btn btn-border-none btn-outline-light"><i class="fa fa-file-pdf-o fa-2x"></i></a>
                </div>
            </div>
        </div>
        <!--INGRESOS -->
        <div class="col-md-8 offset-md-2">
            <div class="card text-center text-white bg-danger">
                <div class="card-header">
                    Ingresos de Pedidos
                </div>
                <div class="card-body">
                    <!--<h5 class="card-title">Special title treatment</h5>
                    <p class="card-text text-white">With supporting text below as a natural lead-in to additional content.</p>-->
                    <a href="{{ url('/reporte/ingresoCli/'.$datos['fei'].'/'.$datos['fef'].'/') }}" class="btn btn-border-none btn-outline-light"><i class="fa fa-file-pdf-o fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection