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
        Schema::create('routes', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("local_destino")->unsigned();
            $table->integer("local_partida")->unsigned();
            $table->integer("agencia_id")->unsigned();
            $table->timestamps();
            $table->foreign("local_partida")->references("id")->on("destinos")->onDelete("cascade");
            $table->foreign("local_destino")->references("id")->on("destinos")->onDelete("cascade");
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
        Schema::dropIfExists('routes');
    }
};
