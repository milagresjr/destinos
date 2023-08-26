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
            $table->integer("rota")->unsigned();
            $table->integer("preco_bilhete");
            $table->date("data_partida");
            $table->time("hora_partida");
            $table->time("hora_chegada");
            //$table->time("agencia");
            $table->integer("agencia_id")->unsigned();
            $table->integer("terminal_partida")->unsigned();
            $table->integer("terminal_chegada")->unsigned();
            $table->timestamps();

            $table->foreign("agencia_id")->references("id")->on("agencias")->onDelete("cascade");
            $table->foreign("rota")->references("id")->on("routes")->onDelete("cascade");
            $table->foreign("terminal_partida")->references("id")->on("terminais")->onDelete("cascade");
            $table->foreign("terminal_chegada")->references("id")->on("terminais")->onDelete("cascade");
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
