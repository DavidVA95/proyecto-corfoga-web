<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Crea la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->integer('serialInspectionID');
            $table->integer('serialAnimalID');
            $table->tinyInteger('serialFeedingMethodID');
            $table->string('weight', 6);
            $table->string('scrotalCircumference', 5);
            $table->string('observations');

            $table->primary(['serialInspectionID', 'serialAnimalID']);
            $table->foreign('serialInspectionID')->references('serialID')->on('inspections');
            $table->foreign('serialAnimalID')->references('serialID')->on('animals');
            $table->index('serialFeedingMethodID');
        });
    }

    /**
     * Revierte la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
