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
        Schema::create('materielInformtique', function (Blueprint $table) {
            $table->integer('numeroSerie');
            $table->string('TypeMateriel');
            $table->string('marquMateriel');
            $table->string('modelMateriel');
            $table->timestamps('dateAquisition');
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
