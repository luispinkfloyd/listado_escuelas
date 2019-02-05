<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperioresConurbanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superiores_conurbanos', function (Blueprint $table) {
            $table->increments('id');
			$table->string('jurisdiccion')->default('Buenos Aires');
			$table->bigInteger('cue');
			$table->string('nombre')->nullable();
			$table->string('sector')->nullable();
			$table->string('ambito')->nullable();
			$table->string('domicilio')->nullable();
			$table->integer('cp')->nullable();
			$table->string('telefono')->nullable();
			$table->bigInteger('codigo_localidad')->nullable();
			$table->string('localidad')->nullable();
			$table->string('partido')->nullable();
			$table->string('mail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('superiores_conurbanos');
    }
}
