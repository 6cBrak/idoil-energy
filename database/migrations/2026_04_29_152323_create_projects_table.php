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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('client')->nullable();
            $table->string('localisation')->nullable();
            $table->year('annee')->nullable();
            $table->text('description');
            $table->string('categorie')->default('Pétrole & Gaz');
            $table->string('image')->nullable();
            $table->string('statut')->default('Réalisé');
            $table->boolean('en_vedette')->default(false);
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
