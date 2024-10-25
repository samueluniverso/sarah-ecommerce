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
        Schema::create('pessoas_enderecos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_pessoa')->unsigned();
            $table->bigInteger('fk_endereco')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('pessoas_enderecos', function(Blueprint $table) {
            $table->foreign('fk_endereco')->references('id')->on('enderecos');
            $table->foreign('fk_pessoa')->references('id')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas_enderecos');
    }
};
