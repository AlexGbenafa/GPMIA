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
        Schema::create('inventaireMateriel', function (Blueprint $table) 
        {
            $table->string('matriculeEmployee')->nullable();;
            $table->enum('site', ['DGY', 'DGV', 'CEV', 'KHA', 'SAN MARCO']);
            $table->string('nomEmployee')->nullable();;
            $table->string('serviceEmployee')->nullable();;
            $table->string('fonctionEmployee')->nullable();
            $table->string('modelMateriel')->nullable();;
            $table->string('nomMateriel')->nullable();
            $table->unsignedSmallInteger('anneeAquisition')->nullable();;
            $table->string('Observation')->nullable();
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
