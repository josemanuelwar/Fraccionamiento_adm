<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFracionamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fracionamientos', function (Blueprint $table) {
            $table->bigIncrements('ID_FRAC');
            $table->string('NOMBRE_FRAC');
            $table->string('NUMERO_FRAC');
            $table->unsignedBigInteger('MUNICIPIO_FRAC');
            $table->unsignedBigInteger('ADMIN_FRAC');
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
        Schema::dropIfExists('fracionamientos');
    }
}
