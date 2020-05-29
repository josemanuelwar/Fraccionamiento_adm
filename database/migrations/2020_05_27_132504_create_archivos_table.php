<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->bigIncrements('ID_ARCHIVO');
            $table->string("NOMBRE_ARCHIVO",100);
            $table->string("URL_ARCHIVO",100);
            $table->unsignedBigInteger('ID_FRACT_ARCHIVO');
            $table->foreign('ID_FRACT_ARCHIVO')->references('ID_FRAC')->on('fracionamientos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivos');
    }
}
