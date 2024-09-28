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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_marca')->unsigned()->nullable();
            $table->string('nome')->nullable();
            $table->char('is_destaque')->nullable();
            $table->float('preco');
            $table->timestamps();
        });

        Schema::table('produtos', function(Blueprint $table) {
            $table->foreign('fk_marca')->references('id')->on('marcas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
