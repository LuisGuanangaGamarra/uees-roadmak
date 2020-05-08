<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosFlujosEfectivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados_flujos_efectivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idconsultoria');
            $table->string('name');
            $table->string('periodo1');
            $table->string('periodo2');
            $table->string('periodo3');
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
        Schema::dropIfExists('estados_flujos_efectivos');
    }
}
