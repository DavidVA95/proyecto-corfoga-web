<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->integer('asocebuID')->primary();
            $table->integer('serialUserID');
            $table->tinyInteger('serialRegionID');
            $table->string('name', 100);
            $table->timestamps();

            $table->foreign('serialUserID')->references('serialID')->on('users');
            $table->foreign('serialRegionID')->references('serialID')->on('regions');
            $table->index(['asocebuID', 'serialUserID', 'serialRegionID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farms');
    }
}
