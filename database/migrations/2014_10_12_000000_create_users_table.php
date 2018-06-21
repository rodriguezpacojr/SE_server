<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            //$table->enum('rol', ['alumno', 'administrador', 'instructor'])->default('alumno');
            $table->rememberToken();
            $table->timestamps();
        });

        /*
        //Many to Many
        //En orden alfabetico y en singular
        Schema::create('alumno_curso', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alumno_id')->unsigned();
            $table->integer('curso_id')->unsigned();
            $table->string('faltas');
            $table->string('calificacion');

            $table->foreign('alumno_id')->references('id')->on('alumno');
            $table->foreign('curso_id')->references('id')->on('programa');

            $table->timestamps();
        });
        */
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