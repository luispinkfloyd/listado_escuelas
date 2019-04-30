<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpAcentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE OR REPLACE FUNCTION f_limpiar_acentos(text) RETURNS text AS \$BODY$ SELECT translate($1,'àáÁÀèéÉÈìíÌÍóòÓÒùúÙÚ','aaAAeeEEiiIIooOOuuUU'); \$BODY$ LANGUAGE sql IMMUTABLE STRICT COST 100");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION f_limpiar_acentos(text)');
    }
}
