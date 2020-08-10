@extends('layouts.font')
@section('head')

    <!--<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>-->
@endsection
@section('content')
    <div class="col-md-8 offset-md-2">
        <h2 class="text">Cotizador</h2>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="malla-tab" data-toggle="tab" href="#malla" role="tab" aria-controls="malla" aria-selected="true">Mallas</a>
                <a class="nav-item nav-link" id="alambre-tab" data-toggle="tab" href="#alambre" role="tab" aria-controls="alambre" aria-selected="false">Alambres</a>
            </div>
        </nav>
        <div class="content tab-content" id="nav-tabContent">
            <!--Mallas-->
            @include('cotizador.index-mallas')
            <!--alambres-->
            @include('cotizador.index-alambres')
        </div>
    </div>
@endsection
@section('scripts')
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>-->
    <script>
        //mallas
        $(document).ready(function(){
            $("#s-mallas").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#c-mallas .l-m").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
                $("#c-mallas").show();
            });
        });
        $("#c-mallas").hide();
        $(".datMalla").hide();

        $(document).ready(function(){
           $("body").on("click",function () {
              $("#c-mallas").hide();
           });
        });
        //alambres
        $(document).ready(function(){
            $("#s-alambres").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#c-alambres .l-l").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
                $("#c-alambres").show();
            });
        });
        $("#c-alambres").hide();
        $(".datAlambre").hide();

        $(document).ready(function(){
            $("body").on("click",function () {
                $("#c-alambres").hide();
            });
        });
    </script>
    <script>
        addEventListener('load',inicio,false);
        function inicio()
        {
            document.getElementById('c-mallas').addEventListener('change',cambio,false);
            document.getElementById('c-alambres').addEventListener('change',cambio,false);
        }

        function cambioM(id,name)
        {
            document.getElementById('malla_id').value=id;
            document.getElementById('nameMalla').innerHTML='Malla '+name.charAt(0).toUpperCase() + name.slice(1);
            $(".datMalla").show();
            if(name=='olimpica'){
                $("#alto_id").show();
                $("#largo_id").show();
            }
            else{
                $("#alto_id").hide();
                $("#largo_id").hide();
            }

        }
        function cambioA(id,name)
        {
            document.getElementById('alambre_id').value=id;
            document.getElementById('nameAlambre').innerHTML='Alambre '+name.charAt(0).toUpperCase() + name.slice(1);
            $(".datAlambre").show();
        }
    </script>
@endsection