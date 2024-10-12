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
        Schema::create('medidas', function (Blueprint $table) {
            $table->id();
            $table->string('completo');
            $table->string('sigla');
            $table->float('comprimento')->nullable();
            $table->float('largura')->nullable();
            $table->float('altura')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medidas');
    }
};

// Crie medidas para roupas contendo as seguintes informacoes: completo("Extra grande"),sigla(G,GG, M etc...), comprimento, largura e altura
