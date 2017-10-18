<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Crea la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 12)->primary();
            $table->string('name', 30);
            $table->string('lastName', 30);
            $table->string('password', 60);
            $table->string('email')->unique();
            $table->string('phoneNumber', 9)->nullable();
            $table->enum('role', ['a', 'i', 'p']);
            $table->rememberToken();
            $table->timestamps();
            $table->index('id');
        });
    }

    /**
     * Revierte la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
