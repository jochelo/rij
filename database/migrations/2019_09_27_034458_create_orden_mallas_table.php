<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenMallasTable extends Migration
{
    public function up()
    {
        Schema::create('orden_mallas', function (Blueprint $table) {
            $table->Increments('id');
            $table->float('alto')->nullable();
            $table->float('largo')->nullable();
            $table->integer('cantidad');
            $table->float('precio');

            $table->integer('malla_id')->unsigned();
            $table->foreign('malla_id')->references('id')->on('mallas');

            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos');

            $table->softDeletes();
            $table->timestamps();
        });
    }
   public function down()
    {
        Schema::dropIfExists('orden_mallas');
    }
}
