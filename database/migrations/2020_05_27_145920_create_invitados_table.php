<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitados', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_INVITADO');
            $table->unsignedBigInteger('ID_EVEN');
            $table->foreign('ID_INVITADO')->references('ID_VIST')->on('visitantes');
            $table->foreign('ID_EVEN')->references('ID_AGEEVE')->on('agendar_eventos');
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
        Schema::dropIfExists('invitados');
    }
}
