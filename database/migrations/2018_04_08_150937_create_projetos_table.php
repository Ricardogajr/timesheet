<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->integer('cliente_id')->unsigned();   
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('consultor_id')->unsigned();               
            $table->foreign('consultor_id')->references('id')->on('users');
            $table->integer('tipoHora');
            $table->time('totalHr');
            $table->time('totalHrConsumida');
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
        Schema::dropIfExists('projetos');
    }
}
