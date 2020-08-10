<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMallasTable extends Migration
{
    public function up()
    {
        Schema::create('mallas', function (Blueprint $table) {
            $table->Increments('id');
            $table->enum('tipoMalla',['hexagonal','olimpica','quinua','ganadera']);
            $table->float('celda');
            $table->integer('alambre');
            $table->float('precio',10,7);
            $table->string('descripcion')->default('ninguna');
            $table->string('fotoMalla')->default(env('AWS_URL').'/rij/imgProd/malla.png');
            $table->float('alto')->nullable();
            $table->float('largo')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('mallas');
    }
}
