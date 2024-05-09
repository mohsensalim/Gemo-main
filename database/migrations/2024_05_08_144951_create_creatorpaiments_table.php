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
        Schema::create('creatorpaiments', function (Blueprint $table) {
            $table->bigInteger('ID_CP')->primary();
            $table->string('Mode_Paiment')->nullable();
            $table->string('Identifiant')->nullable();
            $table->float('Amount')->nullable();
            $table->date('Date_Paiment')->nullable();
            $table->string('Etat_Paiment')->nullable();
            $table->BigInteger('id')->nullable();
            $table->foreign('id')->references('id')->on('creators')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creatorpaiments');
    }
};
