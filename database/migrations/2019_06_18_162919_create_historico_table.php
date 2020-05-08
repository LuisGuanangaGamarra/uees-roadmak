<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico', function (Blueprint $table) {
            $table->increments('id');
            //CONSULTORIAS
            $table->string('name_consultoria');
            $table->string('precio_consultoria');
            $table->string('descripcion_consultoria');

            //SUB-CONSULTORIAS
            $table->string('name_subconsultoria');
            $table->string('precio_subconsultoria');
            
            //DATOS CLIENTE
            $table->string('cedula_ruc_cliente');
            $table->string('nombre_cliente')->nullable();
            $table->string('apellidos_cliente')->nullable();
            $table->string('empresa_cliente')->nullable();
            $table->string('direccion_cliente');
            $table->string('ciudad_cliente');
            $table->string('telefono_cliente');
            $table->string('pais_cliente')->nullable();

            //CONSULTORIA COMPRADA
            $table->integer('id_consultoria_comprada')->unsigned()->index();//JNIEVES

            
            //PERIODO
            $table->integer('num_periodos')->unsigned()->index();//JNIEVES

            //ESTADO COMPRA
            $table->string('estado')->nullable();
            //ARCHIVO COMPRA
            $table->string('archivo')->nullable();

            //DATOS COMPRADOR
            $table->string('name_usercomprador');
            $table->string('lastname_usercomprador');
            $table->string('email_usercomprador');
            
            //DATOS CONSULTOR
            $table->string('name_userconsultor');
            $table->string('lastname_userconsultor');
            $table->string('email_userconsultor'); 
         /*   $table->string('name_subconsultor');
            $table->string('precio_subconsultor');
            $table->string('email_userconsultor'); */

         /*    $table->renameColumn('name_subconsultor', 'name_userconsultor');
            $table->renameColumn('precio_subconsultor', 'lastname_userconsultor');
            $table->renameColumn('email_userconsultor', 'descripcion_subconsultor'); */
 
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
        Schema::dropIfExists('historico');
    }
}
