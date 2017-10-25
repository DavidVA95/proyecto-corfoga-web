<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRegionsTable extends Migration
{
    /**
     * Crea la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->tinyInteger('serialID')->primary()->unsigned();
            $table->string('name', 16);
        });
        // Se insertan los valores por defecto de la tabla.
        DB::table('regions')->insert([
            ['serialID' => 1, 'name' => 'Central'],
            ['serialID' => 2, 'name' => 'Chorotega'],
            ['serialID' => 3, 'name' => 'Pacífico Central'],
            ['serialID' => 4, 'name' => 'Brunca'],
            ['serialID' => 5, 'name' => 'Huetar Atlántica'],
            ['serialID' => 6, 'name' => 'Huetar Norte']
        ]);
    }

    /**
     * Revierte la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
