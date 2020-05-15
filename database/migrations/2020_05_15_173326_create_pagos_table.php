<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('ID_PAGOS');
            $table->unsignedBigInteger('ID_USUARIO');
            $table->unsignedBigInteger('ID_CUOTA');
            $table->unsignedBigInteger('ID_TIPO_PAGOS');
            $table->date('FECHAINICIO_PAGO');
            $table->date('FECHAFINAL_PAGO');
            $table->unsignedBigInteger('ID_MULTAS')->nullable();
            $table->integer('NUMERO_DE_CUENTA_PAGO')->nullable();
            $table->enum("ACTIVO_PAGO",['1','0']);
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
        Schema::dropIfExists('pagos');
    }
}
