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
        Schema::create('packs', function (Blueprint $table) {
           
            $table->bigInteger('Id_Pack')->primary();
            $table->string('Nom_Pack')->nullable();
            $table->string('Etat_Pack')->nullable();
            $table->float('Prix_Pack')->nullable();
            $table->bigInteger('Pack_Coins')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packs');
    }
};
