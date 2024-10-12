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
        Schema::create('promocoes', function (Blueprint $table) {
            $table->id();
            $table->timestamp('dt_inicio');
            $table->timestamp('dt_fim');
            $table->float('vl_percentual');
            $table->float('vl_absoluto');
            $table->bigInteger('fk_produto')->unsigned()->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('promocoes', function(Blueprint $table) {
            $table->foreign('fk_produto')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promocoes');
    }
};
