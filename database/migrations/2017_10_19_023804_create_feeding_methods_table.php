<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateFeedingMethodsTable extends Migration
{
    /**
     * Crea la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeding_methods', function (Blueprint $table) {
            $table->tinyInteger('serialID')->primary()->unsigned();
            $table->string('name', 25);
        });
        // Se insertan los valores por defecto de la tabla.
        DB::table('feeding_methods')->insert([
            ['serialID' => 1, 'name' => 'Pastoreo'],
            ['serialID' => 2, 'name' => 'Estabulación'],
            ['serialID' => 3, 'name' => 'Semi estabulación'],
            ['serialID' => 4, 'name' => 'Suplementación en potrero']
        ]);
    }

    /**
     * Revierte la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feeding_methods');
    }
}
