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
        Schema::create('produtos_categorias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_produto')->unsigned()->nullable(false);
            $table->bigInteger('fk_categoria')->unsigned()->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('produtos_categorias', function (Blueprint $table) {
            $table->foreign('fk_produto')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('fk_categoria')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos_categorias');
    }
};
