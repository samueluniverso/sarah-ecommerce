<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_produto')->unsigned()->nullable();
            $table->bigInteger('fk_medida')->unsigned()->nullable();
            $table->bigInteger('fk_caracteristica_produto')->unsigned()->nullable();
            $table->integer('maximo')->unsigned();
            $table->integer('minimo')->unsigned();
            $table->integer('quantidade')->unsigned();
            $table->integer('ponto_pedido')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('estoques', function(Blueprint $table) {
            $table->foreign('fk_produto')->references('id')->on('produtos');
            $table->foreign('fk_medida')->references('id')->on('medidas');
            $table->foreign('fk_caracteristica_produto')->references('id')->on('caracteristicas_produtos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};
