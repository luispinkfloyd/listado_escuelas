<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperioresCabasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superiores_cabas', function (Blueprint $table) {
            $table->increments('id');
			$table->string('jurisdiccion')->default('Ciudad de Buenos Aires');
			$table->bigInteger('cue');
			$table->string('nombre');
			$table->string('sector');
			$table->string('ambito');
			$table->string('domicilio');
			$table->integer('cp');
			$table->string('telefono')->nullable();
			$table->bigInteger('codigo_localidad');
			$table->string('localidad')->default('Ciudad de Buenos Aires');
			$table->string('comuna');
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
        Schema::dropIfExists('superiores_cabas');
    }
}
