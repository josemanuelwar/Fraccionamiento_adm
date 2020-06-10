<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosDeServiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_de_servios', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_PAGSER');
            $table->string('CONCEPTO_PAGSER');
            $table->unsignedDecimal('PRECIO_PGSER',8,2);
            $table->unsignedTinyInteger('NUMERO_DE_CUENTA_PAGSER');
            $table->date('FECHA_PAGSER');
            $table->longText('IMGCOMPROVANTE_PAGSER');
            $table->unsignedDecimal('TOTAL_PAGSER');
            $table->unsignedBigInteger('ID_PROVEDOR');
            $table->foreign('ID_PROVEDOR')->references('id_us')->on('users');
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
        Schema::dropIfExists('pagos_de_servios');
    }
}
