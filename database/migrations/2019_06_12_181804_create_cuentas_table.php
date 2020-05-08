<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('formula',300)->nullable();
            $table->string('posicion_cuenta');
            $table->string('posicion_formula');
            $table->integer('id_estado_financiero')->unsigned();
            $table->foreign('id_estado_financiero')->references('id')->on('EstadosFinancieros')->onDelete('cascade');
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
        Schema::dropIfExists('cuentas');
    }
}
