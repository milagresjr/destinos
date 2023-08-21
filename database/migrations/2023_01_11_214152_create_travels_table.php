<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->increments("id");
            $table->string("ponto_partida");
            $table->string("destino");
            $table->decimal("preco_bilhete",10,2);
            $table->date("data_partida");
            $table->time("hora_partida");
            //$table->time("agencia");
            $table->integer("agencia_id")->unsigned();
            $table->integer("terminal")->unsigned();
            $table->timestamps();

            $table->foreign("agencia_id")->references("id")->on("agencias")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travels');
    }
};
