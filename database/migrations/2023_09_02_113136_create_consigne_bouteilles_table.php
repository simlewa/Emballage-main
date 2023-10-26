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
        Schema::create('consigne_bouteilles', function (Blueprint $table) {
            $table->id();
            $table->string('consignation_initial');
            $table->string('type_bouteille');
            $table->integer('nombre_bouteille');
            $table->string('nom_consignant');
            $table->string('depot');
            $table->string('contact');
            $table->string('etat');
            $table->string('consignation_final');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consigne_bouteilles');
    }
};
