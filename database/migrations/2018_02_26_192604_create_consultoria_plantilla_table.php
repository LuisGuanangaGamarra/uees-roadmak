<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultoriaPlantillaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultoria_plantilla', function (Blueprint $table) {
            $table->increments('id');
/*             $table->string('id_consultoria');
            $table->string('id_plantilla'); */


            $table->integer('id_consultoria')->unsigned()->index();
            $table->foreign('id_consultoria')->references('id_product')->on('ps_product')->onDelete('cascade');

            $table->integer('id_plantilla')->unsigned()->index();
            $table->foreign('id_plantilla')->references('id')->on('plantilla')->onDelete('cascade');
           /*  $table->integer('periodo')->default(3); */

            $table->string('default')->default('False');
            //$table->string('descripcion');
            //$table->string('archivo_plantilla');
           // $table->string('años');
            //$table->string('plantilla_seleccionado');
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
        Schema::dropIfExists('consultoria_plantilla');
    }
}
