<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultoriasCompradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultorias_compradas', function (Blueprint $table) {
            $table->increments('id');

            //CLAVE DE CLIENTE
            $table->integer('cliente')->unsigned()->index();
            $table->foreign('cliente')->references('id')->on('users')->onDelete('cascade');

            //CLAVE DE CONSULTORIA
/*             $table->integer('consultorias')->unsigned()->index();
            $table->foreign('consultorias')->references('id')->on('consultoria_plantilla')->onDelete('cascade'); */

/*             $table->integer('consultorias')->unsigned()->index();
            $table->foreign('consultorias')->references('id_product')->on('ps_product')->onDelete('cascade'); */
/*             $table->foreign('consultorias')->references('id')->on('consultoria_plantilla')->onDelete('cascade'); JNIEVES*/


            $table->integer('consultorias')->unsigned()->index();
            $table->foreign('consultorias')->references('id')->on('subconsultorias')->onDelete('cascade');



            $table->integer('num_periodos')->unsigned()->index();//JNIEVES


            //CLAVE DE CONSULTOR
            $table->integer('consultor')->unsigned()->index();
            $table->foreign('consultor')->references('id')->on('users')->onDelete('cascade');

            $table->integer('datos_compra')->unsigned()->index();
            $table->foreign('datos_compra')->references('id')->on('clientes')->onDelete('cascade');

            //$table->string('consultorias');
            //$table->string('consultor');
            $table->string('estado')->nullable();
            $table->string('archivo')->nullable();
            $table->timestamp('fecha_asignada')->nullable();//consultor
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
        Schema::dropIfExists('consultorias_compradas');
    }
}
