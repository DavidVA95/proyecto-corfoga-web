<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricalsTable extends Migration
{
    /**
     * Crea la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicals', function (Blueprint $table) {
            $table->increments('serialID');
            $table->integer('serialUserID')->unsigned();
            $table->tinyInteger('serialTypeID')->unsigned();
            $table->dateTime('datetime');
            $table->string('description');

            $table->foreign('serialUserID')->references('serialID')->on('users');
            $table->foreign('serialTypeID')->references('serialID')->on('types');
            $table->index(['dateTime', 'serialUserID', 'serialTypeID']);
        });
    }

    /**
     * Revierte la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historicals');
    }
}
