@extends('layouts.font')
@section('content')
    @if(isset($datos['malla_id']))
        @include('cotizador.show-malla')
    @else
        @include('cotizador.show-alambre')
    @endif
@endsection
