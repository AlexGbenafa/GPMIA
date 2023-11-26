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
        Schema::create('demandeMateriel', function (Blueprint $table) {
            $table->id();
            $table->integer('numeroMatriculeEmployee');
            $table->string('nomEmployee');
            $table->string('prenomEmployee');
            $table->enum('structureEmployee', ['DGDS', 'DMTI', 'DNA', 'CNS']);
            $table->string('fonctionEmployee');
            $table->string('designationDemande');
            $table->enum('status', ['En attente', 'Approuve', 'Refuse'])->default('En attente');
            $table->timestamps('dateSoumissionDemande');
        });
        
    }
    //En attente | ApprouvÉe | RefusÉe
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
