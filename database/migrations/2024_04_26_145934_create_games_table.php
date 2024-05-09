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
        Schema::create('games', function (Blueprint $table) {
            $table->bigInteger('IDG')->primary();
            $table->string('Title')->unique();
            $table->longText('Description')->nullable();
            $table->string('Category')->nullable();
            $table->bigInteger('Jeux_Prix')->nullable();
            $table->date('date_publishing')->nullable();
            $table->longText('Main_Picture')->charset('binary')->nullable(); // LONGBLOB
            $table->longText('Screen1')->charset('binary')->nullable(); // LONGBLOB
            $table->longText('Screen2')->charset('binary')->nullable(); // LONGBLOB
            $table->longText('Screen3')->charset('binary')->nullable(); // LONGBLOB
            $table->string('Download_Path')->nullable();
            $table->string('etat_jeux')->nullable();
            $table->string('ECIN', 20)->nullable();
            $table->BigInteger('id')->nullable();
            $table->BigInteger('ID_Pack')->nullable();
            $table->foreign('ID_Pack')->references('id')->on('creators')->onDelete('cascade');
            // $table->foreign('ID_Pack')->references('id')->on('packs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
