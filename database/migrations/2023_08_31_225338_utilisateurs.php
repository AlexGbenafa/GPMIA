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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id(); // Utilisation de l'ID par défaut de Laravel
            $table->string('matricule')->unique(); // Déclaration de 'matricule' comme une colonne unique
            $table->string('nom');
            $table->string('prenom');
            $table->string('direction');
            $table->string('service');
            $table->string('fonction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
