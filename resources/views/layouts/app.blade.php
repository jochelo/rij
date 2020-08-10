<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{'/images/logo2.png'}}">
    <!-- Author Meta -->
    <meta name="author" content="JocheloDesing">
    <!-- Meta Description -->
    <meta name="description" content="CIMA - Trefileria">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>CIMA - Trefileria</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,400,300,500,600" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    {!!Html::style('index/css/linearicons.css')!!}

    {!!Html::style('index/css/owl.carousel.css')!!}
    {!!Html::style('index/css/font-awesome.min.css')!!}
    {!!Html::style('index/css/nice-select.css')!!}
    {!!Html::style('index/css/magnific-popup.css')!!}
    {!!Html::style('index/css/bootstrap.css')!!}
    {!!Html::style('index/css/main.css')!!}
    {!!Html::style('css/estilos.css')!!}

    @yield('styles')
</head>
<body>
<!-- Start Header Area -->
<header class="default-header">
    <div class="container">
        <div class="header-wrap">
            <div class="header-top d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{ url('/') }}"><img class="logo-sm" src="{{url('/images/logo.png')}}" alt="Logo"></a>
                </div>
                <div class="main-menubar d-flex align-items-center">
                    <nav class="hide">
                        <a href="{{ url('/') }}">Inicio</a>
                        <a href="{{ url('/galeria') }}">Galeria</a>
                        <a href="{{ url('/contactos') }}">Contactos</a>
                        <a href="{{ route('reservas.create') }}">Reserva</a>
                        <a href="{{ route('login') }}">Iniciar sesión</a>
                    </nav>
                    <div class="menu-bar"><span class="lnr lnr-menu"></span></div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header Area -->

@yield('content')



<!-- Strat Footer Area -->
<footer class="section-gap">
    <div class="container">

        <div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">
            <p class="footer-text m-0">Copyright &copy; 2019 Todos los derechos reservados  </p>
            <div class="footer-social d-flex align-items-center">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-whatsapp"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Area -->
@yield('scripts')
{!!Html::script('index/js/vendor/jquery-2.2.4.min.js')!!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

{!!Html::script('index/js/vendor/bootstrap.min.js')!!}
{!!Html::script('index/js/jquery.ajaxchimp.min.js')!!}
{!!Html::script('index/js/owl.carousel.min.js')!!}
{!!Html::script('index/js/jquery.nice-select.min.js')!!}
{!!Html::script('index/js/jquery.magnific-popup.min.js')!!}
{!!Html::script('index/js/main.js')!!}

</body>
</html>