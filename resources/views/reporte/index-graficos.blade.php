@extends('layouts.font')
@section('head')
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script src="/js/code/highcharts.js"></script>
    <script src="/js/code/modules/exporting.js"></script>
    <style type="text/css">
        ${demo.css}
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div id="container-mallas" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        </div>
        <div class="col-md-6">
            <div id="container-alambres" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="container-cliente-pot" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        </div>
        <div class="col-md-6">
            <div id="container-cliente-deu" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        </div>
    </div>
@endsection

@section('scripts')
    @php($meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"])
    <!--MALLA MAS VENDIDA (cantidad)-->
    <script type="text/javascript">
        Highcharts.chart('container-mallas', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',
            },
            title: {
                text: 'Mallas Vendidas '
            },
            subtitle:{
                text:'Desde {{ $meses[$datos['mes']-1] }} del {{ $datos['anio'] }} hasta {{ $meses[$datos['mesU']-1] }} del {{ $datos['anioU'] }}'
            },
            tooltip: {
                pointFormat: '{point.description}<br>{series.name}: <b>{point.y} </b> Unidades.'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}:{point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Cantidad',
                colorByPoint: true,
                data: [
                        @foreach($mallas as $f)
                    {
                        name: '{{ "M. ".$f->tipoMalla }}',
                        // descripcion
                        @if(isset($f->alto) && isset($f->largo))
                        description: '{{ " No: ".$f->alambre."; Dim:".$f->alto."x".$f->largo."mts." }}',
                        @else
                        description: '{{ " Celda: ".$f->celda."; No: ".$f->alambre }}',
                        @endif

                        y: parseInt({{ $f->sum }})
                    },
                    @endforeach
                ],
            }],
            credits:{
                enabled:false
            }
        });
        document.getElementById('auto').addEventListener('click', function () {
            chart.setSize(null);
        });
    </script>
    <!--ALAMBRE MAS VENDIDO (cantidad)-->
    <script type="text/javascript">
        Highcharts.chart('container-alambres', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Alambres Vendidos '
            },
            subtitle:{
                text:'Desde {{ $meses[$datos['mes']-1] }} del {{ $datos['anio'] }} hasta {{ $meses[$datos['mesU']-1] }} del {{ $datos['anioU'] }}'
            },
            tooltip: {
                pointFormat: '{point.description}<br>{series.name}: <b>{point.y} </b> Unidades.'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Cantidad',
                colorByPoint: true,
                data: [
                        @foreach($alambres as $f)
                    {
                        name: '{{ "A. ".$f->tipoAlambre}}',
                        description:'{{ " No: ".$f->awg }}',
                        y: parseInt({{ $f->sum }})
                    },
                    @endforeach
                ]
            }],
            credits:{
                enabled:false
            }
        });
        document.getElementById('auto').addEventListener('click', function () {
            chart.setSize(null);
        });
    </script>
    <!--Cliente potencial-->
    <script type="text/javascript">
        Highcharts.chart('container-cliente-pot', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Clientes Potenciales '
            },
            subtitle:{
                text:'Desde {{ $meses[$datos['mes']-1] }} del {{ $datos['anio'] }} hasta {{ $meses[$datos['mesU']-1] }} del {{ $datos['anioU'] }}'
            },
            tooltip: {
                pointFormat: '{point.description}<br>{series.name}: <b>{point.y} </b> Bs.'

            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Ingreso',
                colorByPoint: true,
                data: [
                        @foreach($clientePot as $f)
                    {
                        name: '{{ $f->nombres }}',
                        description: '{{ $f->apellidos }}',
                        y: parseInt({{ $f->sum }})
                    },
                    @endforeach
                ]
            }],
            credits:{
                enabled:false
            }
        });
        document.getElementById('auto').addEventListener('click', function () {
            chart.setSize(null);
        });
    </script>
    <!--Clientes DEUDORES-->
    <script type="text/javascript">
        Highcharts.chart('container-cliente-deu', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Clientes Deudores '
            },
            subtitle:{
                text:'Desde {{ $meses[$datos['mes']-1] }} del {{ $datos['anio'] }} hasta {{ $meses[$datos['mesU']-1] }} del {{ $datos['anioU'] }}'
            },
            tooltip: {
                pointFormat: '{point.description}<br>{series.name}: <b>{point.y} </b> Bs.'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Deuda',
                colorByPoint: true,
                data: [
                        @foreach($clienteDeu as $f)
                    {
                        name: '{{ $f->nombres }}',
                        description:'{{ $f->apellidos  }}',
                        y: parseInt({{ $f->sum }})
                    },
                    @endforeach
                ]
            }],
            credits:{
                enabled:false
            }
        });
        document.getElementById('auto').addEventListener('click', function () {
            chart.setSize(null);
        });
    </script>
@endsection
