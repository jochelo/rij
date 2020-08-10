<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenAlambresTable extends Migration
{
    public function up()
    {
        Schema::create('orden_alambres', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('cantidad');
            $table->float('precio');

            $table->integer('alambre_id')->unsigned();
            $table->foreign('alambre_id')->references('id')->on('alambres');

            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos');

            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('orden_alambres');
    }
}
