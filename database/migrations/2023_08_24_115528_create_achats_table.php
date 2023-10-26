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
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->integer('CIC');
            $table->integer('CIB');
            $table->integer('retour_achat_casier');
            $table->integer('retour_achat_bouteille');
            $table->integer('achat_casier');
            $table->integer('achat_bouteille');
            $table->string('fournisseur');
            $table->string('type_casier');
            $table->string('type_bouteille');
            $table->integer('CFC');
            $table->integer('CFB');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achats');
    }
};
