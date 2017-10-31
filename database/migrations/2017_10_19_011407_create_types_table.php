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
            $table->tinyInteger('id')->primary()->unsigned();
            $table->string('name', 45)->unique();
        });
        // Se insertan los valores por defecto de la tabla.
        DB::table('types')->insert([
            ['id' => 1, 'name' => 'Crear usuario'],
            ['id' => 2, 'name' => 'Editar usuario'],
            ['id' => 3, 'name' => 'Eliminar usuario'],
            ['id' => 4, 'name' => 'Crear finca'],
            ['id' => 5, 'name' => 'Editar finca'],
            ['id' => 6, 'name' => 'Eliminar finca'],
            ['id' => 7, 'name' => 'Registrar animales'],
            ['id' => 8, 'name' => 'Terminar inspección']
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
