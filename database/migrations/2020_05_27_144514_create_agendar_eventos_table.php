<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendarEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendar_eventos', function (Blueprint $table) {
            $table->bigIncrements("ID_AGEEVE");
            $table->date('FECHA_EVENTO');
            $table->integer('NUMERO_INVITADO');
            $table->unsignedBigInteger("ID_EVENTOS_AG");
            $table->foreign("ID_EVENTOS_AG")->references('ID_EVENTO')->on('tipo_de_eventos');
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
        Schema::dropIfExists('agendar_eventos');
    }
}
