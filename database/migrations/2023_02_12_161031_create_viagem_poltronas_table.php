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
        Schema::create('viagem_poltronas', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("viagem_id")->unsigned();
            $table->integer("numero_poltrona");
            $table->timestamps();
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
        Schema::dropIfExists('viagem_poltronas');
    }
};
