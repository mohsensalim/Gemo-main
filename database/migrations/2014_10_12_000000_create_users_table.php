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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('Prenom')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('Username')->unique()->nullable();
            $table->string('Nationalite')->nullable();
            $table->string('Genre')->nullable();
            $table->date('Date_Naissance')->nullable();
            $table->bigInteger('Telephone')->nullable();
            $table->string('Etat_Mode_Friend')->nullable();
            $table->string('Pin_Mode_Friend')->nullable();
            $table->string('Etat')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
