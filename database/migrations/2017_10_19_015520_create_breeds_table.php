<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateBreedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeds', function (Blueprint $table) {
            $table->tinyInteger('id')->primary()->unsigned();
            $table->string('name', 45);
        });
        // Se insertan los valores por defecto de la tabla.
        DB::table('breeds')->insert([
            ['id' => 1, 'name' => 'Brahman gris'],
            ['id' => 2, 'name' => 'Brahman rojo']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breeds');
    }
}
