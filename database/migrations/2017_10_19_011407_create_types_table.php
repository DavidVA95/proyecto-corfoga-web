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
        DB::table('types')->insert([
            ['serialID' => 1, 'name' => 'Crear usuario'],
            ['serialID' => 2, 'name' => 'Editar usuario'],
            ['serialID' => 3, 'name' => 'Eliminar usuario'],
            ['serialID' => 4, 'name' => 'Crear finca'],
            ['serialID' => 5, 'name' => 'Editar finca'],
            ['serialID' => 6, 'name' => 'Eliminar finca'],
            ['serialID' => 7, 'name' => 'Registrar animales'],
            ['serialID' => 8, 'name' => 'Terminar inspección']
        ]);
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
