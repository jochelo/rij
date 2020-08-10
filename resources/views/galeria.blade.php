@extends('layouts.app')
@section('content')
    <section class="video-area section-gap relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="">
                <div class="col-12">
                    <h3 class="text-white">Galeria</h3>
                </div>
                <br>
                <div class="row gallery-item">
                    <div class="col-12 text-center">
                        <h4 class="text-white">MALLAS</h4>
                    </div>
                    @foreach($mallas as $f)
                        <div class="col-md-4">
                            <a href="{{ $f->fotoMalla }}" class="img-pop-up">
                                <div class="single-gallery-image" style="background: url({{$f->fotoMalla  }});"></div>
                                @if(isset($f->alto)&& isset($f->largo))
                                <div class="burbuja" style="padding-top: 15px;">
                                    <p style="padding-left: 20px;float: left;margin-bottom: 0px;">{{ $f->precio}}
                                    </p>
                                    <p style="font-size: x-small;float: left;margin-bottom: 0px;">
                                        {{ 'Bs.'}}
                                    </p>
                                    <p style="margin-bottom: 1em;font-size: x-small;">
                                        {{'Dim:'.$f->alto.'x'.$f->largo.'mts.' }}
                                    </p>
                                @else
                                <div class="burbuja">
                                    <p style="padding-left: 10px;float: left;margin-bottom: 0px;">{{ $f->precio}}
                                    </p>
                                    <p style="font-size: x-small;float: left;">
                                        {{ 'Bs x m2.'}}
                                    </p>
                                @endif
                                </div>
                                <p class="item-title">Malla {{ $f->tipoMalla }}</p>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-12 text-center">
                        <h4 class="text-white">ALAMBRES</h4>
                    </div>
                    @foreach($alambres as $f)
                        <div class="col-md-4">
                            <a href="{{ $f->fotoAlambre }}" class="img-pop-up">
                                <div class="single-gallery-image" style="background: url({{$f->fotoAlambre  }});"></div>
                                <div class="burbuja">
                                    <p style="padding-left: 20px;float: left;margin-bottom: 0px;">{{ $f->precio}}
                                    </p>
                                    <p style="font-size: x-small;float: left;margin-bottom: 0px;">
                                        {{ 'Bs.'}}
                                    </p>
                                    <p style="margin-bottom: 1em;font-size: x-small;">
                                        {{'No:'.$f->awg }}
                                    </p>
                                </div>
                                <p class="item-title">Alambre {{ $f->tipoAlambre }}</p>

                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </section>
@endsection