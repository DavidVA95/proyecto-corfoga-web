<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionsTable extends Migration
{
    /**
     * Ccrea la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->increments('serialID');
            $table->integer('asocebuFarmID')->unsigned();
            $table->dateTime('datetime');
            $table->tinyInteger('visitNumber')->unsigned();
            $table->timestamps();

            $table->foreign('asocebuFarmID')->references('asocebuID')->on('farms');
            $table->index('asocebuFarmID');
        });
    }

    /**
     * Revierte la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspections');
    }
}
