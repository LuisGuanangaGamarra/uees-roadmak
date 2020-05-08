<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idcompra')->nullable();
            $table->string('idcliente')->nullable();
            $table->string('titulo1')->nullable();
            $table->string('titulo2')->nullable();
            $table->string('titulo3')->nullable();
            $table->string('titulo4')->nullable();
            $table->string('titulo5')->nullable();
            $table->string('titulo6')->nullable();
            $table->string('titulo7')->nullable();
            $table->string('titulo8')->nullable();
            $table->string('titulo9')->nullable();
            $table->string('titulo10')->nullable();
            $table->string('titulo11')->nullable();
            $table->string('titulo12')->nullable();
            $table->string('titulo13')->nullable();
            $table->string('titulo14')->nullable();
            $table->string('titulo15')->nullable();
            $table->string('titulo16')->nullable();
            $table->string('titulo17')->nullable();
            $table->string('titulo18')->nullable();
            $table->string('titulo19')->nullable();
            $table->string('titulo20')->nullable();
            $table->longtext('parrafo1')->nullable();
            $table->longtext('parrafo2')->nullable();
            $table->longtext('parrafo3')->nullable();
            $table->longtext('parrafo4')->nullable();
            $table->longtext('parrafo5')->nullable();
            $table->longtext('parrafo6')->nullable();
            $table->longtext('parrafo7')->nullable();
            $table->longtext('parrafo8')->nullable();
            $table->longtext('parrafo9')->nullable();
            $table->longtext('parrafo10')->nullable();
            $table->longtext('parrafo11')->nullable();
            $table->longtext('parrafo12')->nullable();
            $table->longtext('parrafo13')->nullable();
            $table->longtext('parrafo14')->nullable();
            $table->longtext('parrafo15')->nullable();
            $table->longtext('parrafo17')->nullable();
            $table->string('pais')->nullable();
            //$table->string('pais')->nullable();
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
        Schema::dropIfExists('informes');
    }
}
