<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitantes', function (Blueprint $table) {
            $table->bigIncrements('ID_VIST');
            $table->dateTime('FECHA_ENTRADA_VIST',0);
            $table->dateTime('FECHA_SALIDA_VIST',0);
            $table->string('NOMBRE_VIST',100);
            $table->string('PLACAS_VIST')->nullable();
            $table->longText('QR_VIST');
            $table->unsignedBigInteger('ID_USURIO_VIST');
            $table->foreign('ID_USURIO_VIST')->references('id_us')->on('users');
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
        Schema::dropIfExists('visitantes');
    }
}
