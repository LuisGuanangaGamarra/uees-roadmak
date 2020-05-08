<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultorias', function (Blueprint $table) {
            $table->increments('id');
           // $table->string('id_consultorias_prestashop');
            $table->string('name');
            $table->string('descripcion');
            $table->string('plantilla');
            $table->double('precio', 8, 2);
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
        Schema::dropIfExists('consultorias');
    }
}
