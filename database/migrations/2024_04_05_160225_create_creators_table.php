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
        Schema::create('creators', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('name')->nullable();
            $table->string('Prenom')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('CCIN')->nullable();
            $table->string('Studio_Nom')->nullable();
            $table->longText('Cin_Picture')->charset('binary')->nullable(); // LONGBLOB
            $table->string('Nationalite')->nullable();
            $table->bigInteger('Telephone')->nullable();
            $table->string('City')->nullable();
            $table->string('Genre')->nullable();
            $table->date('Date_Naissance')->nullable();
            $table->string('Etat')->nullable();
            $table->string('password');
            $table->timestamps();
            $table->bigInteger('Coins')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creators');
    }
};
