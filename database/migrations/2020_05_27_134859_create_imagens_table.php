<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagens', function (Blueprint $table) {
            $table->bigIncrements('ID_IMAGEN');
            $table->string("NOMBRE_IMG",60);
            $table->string("URL_IMG",100);
            $table->unsignedBigInteger('ID_USUA_IMG')->nullable();
            $table->unsignedBigInteger('ID_FRAC_IMG')->nullable();
            $table->unsignedBigInteger('ID_VIST_ING')->nullable();
            $table->foreign('ID_USUA_IMG')->references('id_us')->on('users');
            $table->foreign('ID_FRAC_IMG')->references('ID_FRAC')->on('fracionamientos');
            $table->foreign('ID_VIST_ING')->references('ID_VIST')->on('visitantes');
            
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
        Schema::dropIfExists('imagens');
    }
}
