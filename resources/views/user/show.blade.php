@extends('layouts.font')
@section('content')
    <div class="col-md-6 offset-md-3">
        <aside class="profile-nav alt">
            <section class="card">
                <div class="twt-feed blue-bg">
                    <div class="row close-card">
                        <a href="{{ url('users/') }}" class="btn btn-border-none color-white">
                            <i class="ti-close"></i>
                        </a>
                    </div>
                    <div class="fa fa-users wtt-mark"></div>

                    <div>
                        <a href="" data-toggle="modal" data-target="#mediumModal" class="float-left">
                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{ $user->foto }}">
                        </a>
                        <div>
                            <h2 class="text-white display-6">{{ $user->nombre }}</h2>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-user"></i> {{ $user->cuenta }}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-address-book"></i> {{ $user->email }}</a>
                    </li>
                </ul>
            </section>
        </aside>
    </div>
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">

                <div class="modal-body">
                    <img class="align-self-center mr-3" style="width:460px;" alt="" src="{{ $user->foto }}">
                </div>
            </div>
        </div>
    </div>
@endsection
