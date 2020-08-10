<!doctype html>
<html lang="zxx" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CIMA - Trefileria</title>
    <meta name="description" content="CIMA - Trefileria">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" href="{{'/images/logo2.png'}}"> <!--Logos-->
    <link rel="shortcut icon" href="{{'/images/logo2.png'}}">

    @yield('head')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    {!!Html::style('assets/css/cs-skin-elastic.css')!!}
    {!!Html::style('assets/css/lib/datatable/dataTables.bootstrap.min.css')!!}
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    <!--<link rel="stylesheet" href="/index/css/bootstrap.css">-->

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <!--link extras-->



    {!!Html::style('assets/css/style.css')!!}
    {!!Html::style('css/estilos.css')!!}


</head>

<body>
<!-- Left Panel -->
    @include('layouts.nav')
<!-- /#left-panel -->
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    @include('layouts.header')
    <!-- Content -->
    <div class="content">

        @yield('content')
    </div>
    <!-- /.content -->

    <!-- Footer -->
    @guest<footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">
                    Copyright &copy; 2019 Todos los derechos reservados
                </div>

            </div>
        </div>
    </footer>
    @endguest
    <!-- /.site-footer -->
</div>
<!-- /#right-panel -->

<!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    {!!Html::script('assets/js/main.js')!!}

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    {!!Html::script('assets/js/init/weather-init.js')!!}

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    {!!Html::script('assets/js/init/fullcalendar-init.js')!!}

    {!!Html::script('assets/js/lib/data-table/datatables.min.js')!!}
    {!!Html::script('assets/js/lib/data-table/dataTables.bootstrap.min.js')!!}
    {!!Html::script('assets/js/lib/data-table/dataTables.buttons.min.js')!!}
    {!!Html::script('assets/js/lib/data-table/buttons.bootstrap.min.js')!!}
    {!!Html::script('assets/js/lib/data-table/jszip.min.js')!!}
    {!!Html::script('assets/js/lib/data-table/vfs_fonts.js')!!}
    {!!Html::script('assets/js/lib/data-table/buttons.html5.min.js')!!}
    {!!Html::script('assets/js/lib/data-table/buttons.print.min.js')!!}
    {!!Html::script('assets/js/lib/data-table/buttons.colVis.min.js')!!}
    {!!Html::script('assets/js/init/datatables-init.js')!!}

    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>

    @yield('scripts')
</body>
</html>
