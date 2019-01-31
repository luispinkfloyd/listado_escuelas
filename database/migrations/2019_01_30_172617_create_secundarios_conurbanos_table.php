<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecundariosConurbanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secundarios_conurbanos', function (Blueprint $table) {
            $table->increments('id');
			$table->string('jurisdiccion')->default('Buenos Aires');
			$table->bigInteger('cue');
			$table->string('nombre');
			$table->string('sector');
			$table->string('ambito');
			$table->string('domicilio');
			$table->integer('cp')->nullable();
			$table->string('telefono')->nullable();
			$table->bigInteger('codigo_localidad');
			$table->string('localidad');
			$table->string('partido');
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
        Schema::dropIfExists('secundarios_conurbanos');
    }
}
