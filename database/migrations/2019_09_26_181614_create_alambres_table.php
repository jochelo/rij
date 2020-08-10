<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlambresTable extends Migration
{
    public function up()
    {
        Schema::create('alambres', function (Blueprint $table) {
            $table->Increments('id');
            $table->enum('tipoAlambre',['amarre','galvanizado','puas']);
            $table->integer('awg');
            $table->float('peso');
            $table->float('precio',10,7);
            $table->string('descripcion')->default('ninguna');
            $table->string('fotoAlambre')->default(env('AWS_URL').'/rij/imgProd/alambre.png');

            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('alambres');
    }
}
