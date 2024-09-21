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
        Schema::create('pessoas_fisicas', function (Blueprint $table) {
            $table->id();
            $table->string('cpf');
            $table->bigInteger('fk_pessoa')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('pessoas_fisicas', function(Blueprint $table) {
            $table->foreign('fk_pessoa')->references('id')->on('pessoas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas_fisicas');
    }
};
