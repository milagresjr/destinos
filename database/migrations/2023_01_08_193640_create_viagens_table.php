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
        Schema::create('viagens', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("ponto_partida")->unsigned();
            $table->integer("destino")->unsigned();
            $table->decimal("preco_bilhete",10,2);
            $table->date("data_partida");
            $table->time("hora_partida");
            //$table->time("agencia");
            $table->integer("agencia_id")->unsigned();
            $table->timestamps();

            $table->foreign("agencia_id")->references("id")->on("agencias")->onDelete("cascade");
            $table->foreign("ponto_partida")->references("id")->on("provincias")->onDelete("cascade");
            $table->foreign("destino")->references("id")->on("provincias")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viagens');
    }
};
