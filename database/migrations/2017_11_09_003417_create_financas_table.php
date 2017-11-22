<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('finalidade');
            $table->string('valor');
            $table->date('date');
            $table->string('observacoes');
            $table->string('movimentacao');
            $table->integer('id_membro')->unsigned();
            $table->foreign('id_membro')->references('id')->on('membros');
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
        Schema::dropIfExists('financas');
    }
}
