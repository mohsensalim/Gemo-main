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
        Schema::create('_packs', function (Blueprint $table) {
            $table->bigInteger('Id_Pack')->primary();
            $table->string('Nom_Pack');
            $table->string('Etat_Pack');
            $table->float('Prix_Pack');
            $table->bigInteger('Pack_Coins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_packs');
    }
};
