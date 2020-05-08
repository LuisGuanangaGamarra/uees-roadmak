<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantillaSubPlantillaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantilla_sub_plantilla', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('consult_plantilla_id')->unsigned(); --JNI 25/04/2019
            $table->integer('consult_comprada_id')->unsigned();

            $table->integer('subplantilla_id')->unsigned();
            $table->timestamps();
            //relaciones

            //$table->foreign('consult_plantilla_id')->references('id')->on('consultoria_plantilla'); --JNI 25/04/2019
            $table->foreign('consult_comprada_id')->references('id')->on('consultorias_compradas');
            $table->foreign('subplantilla_id')->references('id')->on('sub_plantilla');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantilla_sub_plantilla');
    }
}
