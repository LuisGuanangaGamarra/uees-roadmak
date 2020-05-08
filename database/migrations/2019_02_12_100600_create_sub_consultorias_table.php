<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubConsultoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subconsultorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('grupo')->unsigned();
            $table->foreign('grupo')->references('id_product')->on('ps_product')->onDelete('cascade');
            
            $table->boolean('req_indice');
            $table->string('precio');
            $table->string('estado');
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
        Schema::dropIfExists('subconsultorias');
    }
}
