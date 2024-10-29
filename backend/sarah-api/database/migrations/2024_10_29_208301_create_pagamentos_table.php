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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_pedido')->unsigned()->nullable();
            $table->bigInteger('fk_forma_pagamento')->unsigned()->nullable();
            $table->float('valor')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('pagamentos', function(Blueprint $table) {
            $table->foreign('fk_pedido')->references('id')->on('pedidos');
            $table->foreign('fk_forma_pagamento')->references('id')->on('formas_pagamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
