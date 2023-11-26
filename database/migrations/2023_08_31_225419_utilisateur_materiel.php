<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('utilisateur_materiel', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('nom_materiel'); // Utilisation de 'materiel_id' comme clé étrangère pour faire référence à la table des matériels
            $table->date('date_affectation');
            $table->timestamps();
    
            $table->foreign('matricule')->references('matricule')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('nom_materiel')->references('nom_materiel')->on('materiels')->onDelete('cascade');
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
