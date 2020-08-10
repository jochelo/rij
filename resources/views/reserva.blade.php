@extends('layouts.app')

@section('content')
    <section class="banner-area section-gap relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('reservas.store') }}" method="post" enctype="multipart/form-data" class="contact-form text-right">
                        <div class="text-white" style="font-size: 2em;">Haga su reserva</div>

                        @csrf
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col-12">
                                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese su Nombre" class="common-input mt-10 @error('nombre') is-invalid @enderror">
                                    @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12">
                                    <textarea name="detalle" id="detalle" rows="5"placeholder="Escriba el detalle de su Reserva" class="common-input mt-10 @error('detalle') is-invalid @enderror"></textarea>
                                    @error('detalle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="primary-btn white-bg d-inline-flex align-items-center mt-10 ml-auto">
                                        <span class="mr-10">
                                            Reservar
                                        </span>
                                        <span class="lnr lnr-enter-down"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
