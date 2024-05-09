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
        Schema::create('paniergames', function (Blueprint $table) {
            $table->bigInteger('IDUG')->primary();
            $table->foreignId('user_id')->constrained()->nullable();
            $table->BigInteger('IDG')->nullable();
            $table->foreign('IDG')->references('IDG')->on('games')->onDelete('cascade')->nullable();
            $table->string('EtatAchat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paniergames');
    }
};
