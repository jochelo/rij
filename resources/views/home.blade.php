@extends('layouts.font')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Inicio</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        {{ Auth::user()->nombre }} Bienvenid@ a la ventana de inicio!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
