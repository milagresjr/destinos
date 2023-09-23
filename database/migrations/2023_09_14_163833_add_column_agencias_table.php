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
        Schema::table('agencias', function (Blueprint $table) {
            $table->string("endereco")->nullable();
            $table->string("email")->nullable();
            $table->integer("telefone")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agencias', function (Blueprint $table) {
            $table->dropColumn("endereco");
            $table->dropColumn("email");
            $table->dropColumn("telefone");
        });
    }
};
