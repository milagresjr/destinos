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
        Schema::create('terminais', function (Blueprint $table) {
            $table->increments("id");
            $table->string("nome");
            $table->integer("agencia_id")->unsigned();
            $table->integer("destino_id")->unsigned();
            $table->timestamps();
            $table->foreign('destino_id')->references('id')->on('destinos')->onDelete('cascade');
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
        Schema::dropIfExists('terminais');
    }
};
