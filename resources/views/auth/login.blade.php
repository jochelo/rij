@extends('layouts.app')

@section('content')
    <section class="banner-area section-gap relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('login') }}" method="post" enctype="multipart/form-data" class="contact-form text-right">
                        <div class="text-white" style="font-size: 2em;">Iniciar Sesión</div>

                        @csrf
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col-12">
                                    <input type="text" id="cuenta" name="cuenta" placeholder="Cuenta" class="common-input mt-10 @error('cuenta') is-invalid @enderror">
                                    @error('cuenta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12">
                                    <input type="password" id="password" name="password" placeholder="Contraseña" class="common-input mt-10 @error('password') is-invalid @enderror" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row text-left">
                                <div class="col-12 switch-wrap d-flex justify-content-between">
                                    <div class="primary-switch">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">
                                            <span style="padding-left: 70px">
                                             Recordar
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="primary-btn white-bg d-inline-flex align-items-center mt-10 ml-auto">
                                        <span class="mr-10">
                                            Ingresar
                                        </span>
                                        <span class="lnr lnr-arrow-right"></span>
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-sm" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
