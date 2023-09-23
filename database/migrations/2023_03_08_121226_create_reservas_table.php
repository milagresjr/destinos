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
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("client_id")->unsigned();
            $table->integer("viagem_id")->unsigned();
            $table->integer("numero_poltrona");
            $table->integer("preco_total");
            $table->string("nome_passageiro");
            $table->integer("idade_passageiro");
            $table->timestamps();
            $table->foreign("client_id")->references("id")->on("clients")->onDelete("cascade");
            $table->foreign("viagem_id")->references("id")->on("travels")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
};
