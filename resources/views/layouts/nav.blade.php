<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    @guest
                        <a href="{{url('/')}}"><i class="menu-icon fa fa-laptop"></i>Inicio </a>
                    @else
                        <a href="{{url('/home')}}"><i class="menu-icon fa fa-laptop"></i>Inicio </a>
                    @endguest
                </li>
                <li class="menu-title">Menu</li><!-- /.menu-title -->
            @guest
                <li>
                    <a href="{{ route('login') }}" class="">
                        <i class="menu-icon fa fa-sign-in"></i>
                        Inicio de Sesión
                    </a>
                </li>
            @if (Route::has('register'))
                <li><a href="{{ route('register') }}"><i class="menu-icon fa fa-pencil"></i>{{ __('Registrar') }}</a></li>
            @endif
                <li><a href=""><i class="menu-icon fa fa-phone"></i>Contactos</a></li>
            @else
                {{-- cotizador --}}
                <li><a href="{{ url('/cotizadors ') }}"><i class="menu-icon fa fa-th-list"></i>Cotizador</a></li>
                {{-- Reservas --}}
                <li><a href="{{ url('/reservas ') }}"><i class="menu-icon fa fa-hand-o-up"></i>Reservas</a></li>
                <!--productos-->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-dropbox"></i>Productos</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon ti-dropbox-alt"></i><a href="{{ url('/mallas') }}">Mallas</a></li>
                        <li><i class="menu-icon ti-dropbox-alt"></i><a href="{{ url('/alambres') }}">Alambres</a></li>
                    </ul>
                </li>
                <!--clientes-->
                <li><a href="{{ url('/clientes') }}"> <i class="menu-icon fa fa-users"></i>Clientes</a></li>
                <!--pedidos-->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Pedidos</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-cart-plus"></i><a href="{{ url('/inicio') }}">Realizar Pedidos</a></li>
                        <li><i class="menu-icon ti-shopping-cart-full"></i><a href="{{ url('/pedidos') }}">Lista de Pedidos</a></li>
                    </ul>
                </li>
                <!--usuarios-->
                <li><a href="{{ url('/users') }}"> <i class="menu-icon fa fa-user-secret"></i>Cuentas</a></li>
                <li class="menu-title">Reportes</li><!-- /.reportes -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Reportes</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-pie-chart"></i><a href="{{ url('/reporte/inicioG') }}">Graficos</a></li>
                        <li><i class="menu-icon fa fa-file-pdf-o"></i><a href="{{ url('/reporte/inicioR') }}">Documentos</a></li>
                    </ul>
                </li>
            @endguest
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
