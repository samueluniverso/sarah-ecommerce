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
        Schema::create('imagens_produtos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_imagem')->unsigned()->nullable(false);
            $table->bigInteger('fk_produto')->unsigned()->nullable(false);
            $table->timestamps();
        });

        Schema::table('imagens_produtos', function(Blueprint $table) {
            $table->foreign('fk_imagem')->references('id')->on('imagens');
            $table->foreign('fk_produto')->references('id')->on('produtos');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagens_produtos');
    }
};
