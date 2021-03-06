<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblEventosFixosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_eventos_fixos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('dados_horario_local');
            $table->bigInteger('id_igreja')->unsigned();
            $table->foreign('id_igreja')->references('id')->on('tbl_igrejas');
            $table->string('foto')->nullable();
            $table->text('descricao')->nullable();
            //$table->boolean('banner')->default(false);
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
        Schema::dropIfExists('tbl_eventos_fixos');
    }
}
