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
        Schema::create('materiels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('numero_serie')->nullable();
            $table->string('nom_materiel')->unique();
            $table->string('modele_materiel')->nullable();
            $table->integer('annee_acquisition');
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
