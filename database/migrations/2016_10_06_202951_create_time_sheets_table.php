<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('consultor_id')->unsigned();
            $table->date('data');
            $table->time('horaini');
            $table->time('horafim');
            $table->time('translado');
            $table->time('desconto');
            $table->time('total');
            $table->text('descricao');
            $table->timestamps('d/m/Y');
        });

        Schema::table('time_sheets', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('consultor_id')->references('id')->on('users');
        });
    }   


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_sheets');
    }
}
