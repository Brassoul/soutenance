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
        Schema::create('avieclients', function (Blueprint $table) {
            $table->id();
            $table->string('mail');
            $table->text('commentaire');
            $table->foreignId('produits_id')->constrained();
            $table->foreignId('utulisateur_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avieclients');
    }
};
