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
            $table->bigInteger('fk_marca')->unsigned()->nullable(false);
            $table->string('nome')->nullable(false);
            $table->boolean('is_destaque')->nullable(false);
            $table->float('preco')->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('produtos', function(Blueprint $table) {
            $table->foreign('fk_marca')->references('id')->on('marcas');
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
