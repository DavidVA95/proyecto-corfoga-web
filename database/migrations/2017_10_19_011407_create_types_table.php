<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTypesTable extends Migration
{
    /**
     * Crea la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->tinyInteger('serialID')->primary()->unsigned();
            $table->string('name', 45)->unique();
        });
        // Se insertan los valores por defecto de la tabla.
        /*
        DB::table('types')->insert([
            ['serialID' => 1, 'name' => ''],
            ['serialID' => 2, 'name' => ''],
            ['serialID' => 3, 'name' => '']
        ]);
        */
    }

    /**
     * Revierte la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
