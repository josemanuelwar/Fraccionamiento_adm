<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_us');
            $table->string('nombre_us');
            $table->string('app_us');
            $table->string('apm_us');
            $table->string('nick_us')->unique();
            $table->string('rfc_us');
            $table->integer('numerodecasa_us');
            $table->string('email_us')->unique();
            $table->timestamp('email_verified_us')->nullable();
            $table->string('contrasena_us');
            $table->unsignedBigInteger('rol_us');
            $table->unsignedBigInteger('id_fracionamiento')->nullable();
            //$table->foreignId('rol_us')->references('ID_ROL')->on('roles');
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
