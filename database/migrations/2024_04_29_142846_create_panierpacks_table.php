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
        Schema::create('panierpacks', function (Blueprint $table) {
            $table->bigInteger('Id_PP')->primary();
            $table->foreignId('user_id')->constrained()->nullable();
            $table->BigInteger('Id_Pack')->nullable();
            $table->foreign('Id_Pack')->references('Id_Pack')->on('packs')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panierpacks');
    }
};
