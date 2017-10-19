<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Crea la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('serialID');
            $table->integer('asocebuFarmID');
            $table->tinyInteger('serialBreedID');
            $table->string('register', 15);
            $table->string('code', 15);
            $table->enum('sex', ['m', 'h']);
            $table->date('birthdate');
            $table->string('fatherRegister', 15);
            $table->string('motherRegister', 15);
            $table->timestamps();

            $table->foreign('asocebuFarmID')->references('asocebuID')->on('farms');
            $table->foreign('serialBreedID')->references('serialID')->on('breeds');
            $table->index(['asocebuFarmID', 'serialBreedID']);
        });
    }

    /**
     * Revierte la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
