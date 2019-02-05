<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecundariosCabasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secundarios_cabas', function (Blueprint $table) {
            $table->increments('id');
			$table->string('jurisdiccion')->default('Ciudad de Buenos Aires');
			$table->bigInteger('cue');
			$table->string('nombre')->nullable();
			$table->string('sector')->nullable();
			$table->string('ambito')->nullable();
			$table->string('domicilio')->nullable();
			$table->integer('cp')->nullable();
			$table->string('telefono')->nullable();
			$table->bigInteger('codigo_localidad')->nullable();
			$table->string('localidad')->default('Ciudad de Buenos Aires');
			$table->string('comuna')->nullable();
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
        Schema::dropIfExists('secundarios_cabas');
    }
}
