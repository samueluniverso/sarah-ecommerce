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
        Schema::create('pedidos_produtos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_pedido')->unsigned();
            $table->bigInteger('fk_produto')->unsigned();
            $table->integer('quantidade')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('pedidos_produtos', function(Blueprint $table) {
            $table->foreign('fk_produto')->references('id')->on('produtos');
            $table->foreign('fk_pedido')->references('id')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_produtos');
    }
};
