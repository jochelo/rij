<!-- Header-->
<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            @guest
                <a class="navbar-brand" href="{{ url('/')}}"><img src="/images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{ url('/')}}"><img src="/images/logo2.png" alt="Logo"></a>
            @else
                <a class="navbar-brand" href="{{ url('/home')}}"><img src="/images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{ url('/home')}}"><img src="/images/logo2.png" alt="Logo"></a>
            @endguest
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                @guest
                    <div class="float-right">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa fa-sign-in"></i>
                        </a>
                    </div>
                    @if (Route::has('register'))
                        <div class="float-right">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </div>
                    @endif
                @else
                <!--<div class="dropdown for-notification">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">3</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                        </div>
                    </div>-->
                @endguest
            </div>
            @auth
                <div class="user-area dropdown float-right">
                    <a class="dropdown-toggle active" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar-i" src="{{ Auth::user()->foto }}" alt="Img Usr"></a>
                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="{{ url('users/'.Auth::user()->id) }}"><i class="fa fa-user"></i>{{ Auth::user()->nombre }}</a>
                        <!--<a class="nav-link" href="#"><i class="fa fa-cog"></i>Settings</a>-->
                        <a class="nav-link" href="{{ url('users/'.Auth::user()->id.'/edit') }}">
                            <i class="fa fa-pencil"></i>Editar Perfil
                        </a>
                        <div>
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>Cerrar Sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</header>
<!-- /#header -->